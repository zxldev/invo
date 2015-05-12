<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Plugin
{

	/**
	 * Returns an existing or new access control list
	 *
	 * @returns AclList
	 */
	public function getAcl()
	{
//       unset($this->persistent->acl);
		//throw new \Exception("something");
		if (!isset($this->persistent->acl)) {

			$acl = new AclList();

			$acl->setDefaultAction(Acl::DENY);

			//Register roles
			$roles = array(
				'users'  => new Role('Users'),
				'guests' => new Role('Guests'),
				'bookadmin'=>new Role('BookaAdmin')
			);
			foreach ($roles as $role) {
				$acl->addRole($role);
			}

			//Private area resources
			$privateResources = array(
				'book'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'pre_borrow'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'borrow'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'invoices'     => array('index', 'profile')
			);
			foreach ($privateResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//管理员Private area resources
			$adminprivateResources = array(
				'book'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'pre_borrow'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'borrow'     => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'invoices'     => array('index', 'profile')
			);
			foreach ($adminprivateResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}



			//Public area resources
			$publicResources = array(
				'index'      => array('index'),
				'about'      => array('index'),
				'register'   => array('index'),
				'errors'     => array('show404', 'show500','show401'),
				'session'    => array('index', 'register', 'start', 'end'),
				'contact'    => array('index', 'send')
			);
			foreach ($publicResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Grant access to public areas to both users and guests
			foreach ($roles as $role) {
				foreach ($publicResources as $resource => $actions) {
					foreach ($actions as $action){
						$acl->allow($role->getName(), $resource, $action);
					}
				}
			}



			//Grant acess to private area to role Users
			foreach ($privateResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Users', $resource, $action);
				}
			}

			//TODO 修改这里代码
			foreach ($adminprivateResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('BookaAdmin', $resource, $action);
				}
			}

			//The acl is stored in session, APC would be useful here too
			$this->persistent->acl = $acl;
		}

		return $this->persistent->acl;
	}

	/**
	 * This action is executed before execute any action in the application
	 *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{

		$auth = $this->session->get('auth');
		if (!$auth){
            $roles =array( 'Guests');
		} else {
            $rolestr = $this->redis->get('userrole:userid:'.$auth['id']);
            if($rolestr){
                $roles = json_decode($rolestr);
            }else{
                $roles =array( 'Guests');
            }

		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = $this->getAcl();
        $allowed = Acl::DENY;
        foreach($roles as $role){
            $allowed = $acl->isAllowed($role, $controller, $action);
            if ($allowed == Acl::ALLOW) {
                return true;
            }
        }


        $dispatcher->forward(array(
            'controller' => 'errors',
            'action'     => 'show401'
        ));
        return false;

	}
}
