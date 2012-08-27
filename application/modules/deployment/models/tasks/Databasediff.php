<?php
class Deployment_Model_Tasks_Databasediff extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Database Diff';
	
	protected $_description = 'This task determines differences between the current running state of the database and the configuration files.';
	
	protected $_autoRun = false;
	
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