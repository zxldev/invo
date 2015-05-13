<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('欢迎');
        parent::initialize();
    }

    public function indexAction($userid=null,$role=null)
    {
        if($userid){
           $this-> initRedis($userid,$role);
        }


        if (!$this->request->isPost()) {
//            $this->flash->notice('This is a sample application of the Phalcon Framework.                Please don\'t provide us any personal information. Thanks');
        }
    }
    function initRedis($userid,$role){
        switch($role){
            case "1": $this->redis->set('userrole:userid:'.$userid,json_encode(array(
                'Users','BookAdmin'
            )));break;
            case"2": $this->redis->set('userrole:userid:'.$userid,json_encode(array(
                'Users'
            )));break;
            default:break;
        }

    }
}
