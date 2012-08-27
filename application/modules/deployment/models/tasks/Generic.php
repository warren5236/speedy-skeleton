<?php
abstract class Deployment_Model_Tasks_Generic{
	
	protected $_name = 'Override $_name';
	
	protected $_description = 'Override $_description';
	
	protected $_autoRun = false;

	public function getAutoRun(){
		return $this->_autoRun;
	}
	
	public function getDescription(){
		return $this->_description;
	}
	
	public function getName(){
		return $this->_name;
	}
	
	public function isEnabled(){
		return true;
	}
	
	protected $_results = array();
	
	public function getResultsHtml(){
		$returnVal= implode("\n", $this->_results);
		
		$returnVal = preg_replace('/^#([^#].+)$/m', '<h2>$1</h2>', $returnVal);
		$returnVal = preg_replace('/^##([^#].+)$/m', '<h3>$1</h3>', $returnVal);
		
		return $returnVal;
	}
	
	protected function _addResult($value){
		$this->_results[] = $value;
	}
	
	public abstract function runTask();
}