<?php

class Deployment_IndexController extends Speedy_Controllers_Generic
{
    public function indexAction()
    {
		$this->view->pageTitle = 'All Deployment Tasks';
		parent::indexAction();
    }


}

