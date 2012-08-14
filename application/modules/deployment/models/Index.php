<?php
class Deployment_Model_Index extends Speedy_Models_Generic{
	public static function find($id){
		
	}
	public static function fetchAll($where = null, $order = null, $limit = null, $page = null){
		$returnVal = array();
		
		// determine the files we should import
		$dirname = APPLICATION_PATH . '/modules/deployment/models/tasks/*.php';
		$files = glob($dirname);
		
		foreach($files as $file){
			// find
			if(preg_match('/Generic\.php$/', $file) == 0){
				$className = str_replace(APPLICATION_PATH . '/modules/', '', $file);
				
				// build up the class name
				$allClass = explode('/', $className);
				
				for($current = 0; $current < count($allClass); $current++){
					$allClass[$current] = ucwords($allClass[$current]);
				}
				
				$className = implode('_', $allClass);
				$className = str_replace('.php','',$className);
				
				require_once($file);
				$newClass = new $className();
				
				$returnVal[$newClass->getName()] = $newClass;
			}
			
		}
		
		ksort($returnVal);
		
		return $returnVal;
	}
}