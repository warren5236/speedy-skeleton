<?php
class Deployment_Models_Tasks_Wipestaticfiles extends Deployment_Model_Tasks_Generic{
	protected $_name = 'Wipe Static Files';
	
	protected $_description = 'This task deletes any static files (CSS, JS, etc.) that may have been created.';
	
	protected $_autoRun = true;
}