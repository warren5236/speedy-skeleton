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
	
	public abstract function runTask();
}