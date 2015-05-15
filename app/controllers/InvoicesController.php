<?php

use Phalcon\Flash;
use Phalcon\Session;

class InvoicesController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('管理我的图书');
        parent::initialize();
    }

    public function indexAction()
    {
        $userid = $this->session->get('auth')['id'];
        $borrows = Borrow::find("userid='$userid'");
        if (count($borrows) == 0) {
            $this->flash->notice("您还没有借阅图书");
        }else{
            $this->view->borrows = $borrows;
        }
    }

    /**
     * Edit the active user profile
     *
     */
    public function profileAction()
    {
        //Get session info
        $auth = $this->session->get('auth');

        //Query the active user
        $user = Users::findFirst($auth['id']);
        if ($user == false) {
            return $this->_forward('index/index');
        }

        if (!$this->request->isPost()) {
            $this->tag->setDefault('name', $user->name);
            $this->tag->setDefault('email', $user->email);
        } else {

            $name = $this->request->getPost('name', array('string', 'striptags'));
            $email = $this->request->getPost('email', 'email');

            $user->name = $name;
            $user->email = $email;
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->flash->success('用户信息更新成功。');
            }
        }
    }
}
