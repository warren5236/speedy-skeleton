<?php
class Deployment_Model_Tasks_Wipestaticfiles extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Wipe Static Files';
	
	protected $_description = 'This task deletes any static files (CSS, JS, etc.) that may have been created.';
	
	protected $_autoRun = true;
	
	protected $_keepFiles = array(
		'.',
		'..',
		'.htaccess'
	);
	
	protected function _allDirectories(){
		$baseDir = dirname(APPLICATION_PATH);
		$returnVal = array(
			$baseDir . '/public/css/',
			$baseDir . '/public/scripts/'
		);
		
		return $returnVal;
	}
	
	public function runTask(){
		$returnVal = array();
		// loop through all the directories to check
		foreach($this->_allDirectories() as $dir){
			// open the directory
			if(!is_dir($dir)){
				$this->_addResult($dir . ' is not a valid path');
				continue;
			}
			
			$this->_addResult('##Checking ' . $dir);
			
			if($handle = opendir($dir)){
				while(($file = readdir($handle)) !== false){
					// check to make sure this isn't a file we want to skip
					if(!in_array($file, $this->_keepFiles)){
						// attempt to delete the file and report what happened
						if(!unlink($dir . '/' . $file)){
							$this->_addResult('* Unable to delete ' . $file);
						} else {
							$this->_addResult('*' . $file . ' deleted');
						}
						
					}
					
				}
			}
		}
		
		return true;
	}
}