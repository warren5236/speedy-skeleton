<?php
class Deployment_Model_Tasks_Healthcheck extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Health check';
	
	protected $_description = 'This task checks the server to make sure it\'s not missing anything.';
	
	protected $_autoRun = true;
	
	protected $_directories = array(
		'/public/css/',
		'/public/images/',
		'/public/scripts/',
		'/tmp'
	);
	
	protected $_modules = array(
		'required'=>array('mod_rewrite'=>'This module is so required I\'m not even sure how you\'re seeing this message.'),
		'nicetohave'=>array(
				'mod_headers'=>'Provides support to have long lived static files.',
				'mod_expires'=>'Improves long lived static files',
				'mod_gzip'=>'Compresses static files'
		)
	);
	
	public function _checkDirectories(){
		$this->_addResult('## Directory Check');
		
		$returnVal = true;
		
		// loop through all the directories
		foreach($this->_directories as $dir){
			$dir = dirname(APPLICATION_PATH) . $dir;
			
			// check to see if the directory exists
			if(!is_dir($dir)){
				$this->_addResult('* Missing directory: ' . $dir);
				$returnVal = false;
			} else {
				if(!is_writable($dir)){
					$this->_addResult('* Unwriteable directory: ' . $dir);
					$returnVal = false;
				}
			}
		}
		
		return $returnVal;
	}
	
	public function _checkModules(){
		
		$this->_addResult('## Module Check');
		
		// get the currently loaded modules
		$modules = apache_get_modules();
		
		// the return value
		$returnVal = true;
		
		// loop through all the required modules
		foreach($this->_modules['required'] as $module => $description){
			// check to see if this module
			if(!in_array($module, $modules)){
				$this->_addResult('* Missing required module:' . $module);
				$returnVal = false;
			}
		}
		
		// loop through all the required modules
		foreach($this->_modules['nicetohave'] as $module => $description){
			// check to see if this module
			if(!in_array($module, $modules)){
				$this->_addResult('* Missing optional module:' . $module);
			}
		}
		
		return $returnVal;
	}
	
	public function runTask(){
		$returnVal = true;
		
		if(!$this->_checkModules()){
			$returnVal = false;
		}
		
		if(!$this->_checkDirectories()){
			$returnVal = false;
		}
		
		return $returnVal;
	}
	
	public function isEnabled(){
		if(Speedy_Featuretoggle::enabled(get_class($this))){
			return true;
		}
	}
}