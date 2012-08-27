<?php
class Deployment_Model_Tasks_Healthcheck extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Health check';
	
	protected $_description = 'This task checks the server to make sure it\'s not missing anything.';
	
	protected $_autoRun = true;
	
	public function runTask(){
		$returnVal = array();
		
		return $returnVal;
	}
	
	public function isEnabled(){
		if(Speedy_Featuretoggle::enabled(get_class($this))){
			return true;
		}
	}
}