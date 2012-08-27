<?php
class Deployment_Model_Tasks_Databasepatch extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Database Patch';
	
	protected $_description = 'This task runs all the sql files found in the modules';
	
	protected $_autoRun = true;
	
	public function runTask(){
		$returnVal = array();
		
		$directories = Speedy_ModuleHelper::getAllModuleDirectories('deployment/MySQL');
		
		$databaseManager = new Speedy_Database_Manager();
		
		// loop through all the directories
		foreach($directories as $dir){
			$databaseManager->checkDirectory($dir);
		}
		
		$databaseManager->applyAll();
		
		return $returnVal;
	}
	
	public function isEnabled(){
		if(Speedy_Featuretoggle::enabled(get_class($this))){
			return true;
		}
	}
}