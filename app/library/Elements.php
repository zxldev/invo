<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{

    private $_headerMenu = array(
        'navbar-left' => array(
            'index' => array(
                'caption' => '主页',
                'action' => 'index'
            ),
            'invoices' => array(
                'caption' => '我的图书',
                'action' => 'index'
            ),
            'book' => array(
                'caption' => '图书馆',
                'action' => 'index'
            ),
            'about' => array(
                'caption' => '关于',
                'action' => 'index'
            ),
            'contact' => array(
                'caption' => '联系我们',
                'action' => 'index'
            ),
        ),
        'navbar-right' => array(
            'session' => array(
                'caption' => '登录/注册',
                'action' => 'index'
            ),
        )
    );

    private $_tabs = array(
        '我的图书' => array(
            'controller' => 'invoices',
            'action' => 'index',
            'any' => false
        ),
        '借阅历史' => array(
            'controller' => 'borrow',
            'action' => 'history',
            'any' => false
        ),
        '预借' => array(
            'controller' => 'pre_borrow',
            'action' => 'search',
            'any' => true
        ),
        '我想看的' => array(
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ),
        '个人资料' => array(
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        )
    );


    private $_lib_tabs = array(
        '图书馆' => array(
            'controller' => 'book',
            'action' => 'index',
            'any' => true
        ),
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['session'] = array(
                'caption' => '退出',
                'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['navbar-left']['invoices']);
            unset($this->_headerMenu['navbar-left']['book']);
        }

        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }

    }

    /**
     * Returns menu tabs
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }

    /**
     * Returns menu tabs
     */
    public function getLibTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_lib_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }
}
