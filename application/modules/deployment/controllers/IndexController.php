<?php

class Deployment_IndexController extends Speedy_Controllers_Generic
{
    public function indexAction()
    {
		$this->view->pageTitle = 'All Deployment Tasks';
		parent::indexAction();
    }

	public function runnowAction(){
		// initialize the task
		$className = $this->_getParam('class');
		$instance = new $className();
		
		$this->view->result = $instance->runTask();
		$this->view->results = $instance->getResultsHtml();
		$this->view->pageTitle = $instance->getName();
	}
}

