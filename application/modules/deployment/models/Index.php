<?php
class Deployment_Model_Index extends Speedy_Models_Generic{
	public static function find($id){
		
	}
	public static function fetchAll($where = null, $order = null, $limit = null, $page = null){
		$returnVal = array();
		
		// determine the files we should import
		$dirname = APPLICATION_PATH . '/modules/deployment/models/tasks/';
		$files = glob($dirname . '*.php');
		
		foreach($files as $file){
			// find
			if(preg_match('/Generic\.php$/', $file) == 0){
				$className = str_replace($dirname, '', $file);
				
				$className = 'Deployment_Model_Tasks_' . str_replace('.php','',$className);
				
				require_once($file);
				$newClass = new $className();
				
				if($newClass->isEnabled()){
					$returnVal[$newClass->getName()] = $newClass;
				}
			}
			
		}
		
		ksort($returnVal);
		
		return $returnVal;
	}
}