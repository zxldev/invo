<?php

class AboutController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('关于我们');
        parent::initialize();
    }

    public function indexAction()
    {
    }
}
