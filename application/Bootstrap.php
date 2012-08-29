<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initFeatureToggles(){
		
		// initialize the feature toggle
		$featuretoggle = Speedy_Featuretoggle::getInstance();
		
		$settings = array();
		foreach(Speedy_ModuleHelper::getAllModuleFiles('settings/features.php') as $file){
			$settings = array_merge_recursive($settings, eval(file_get_contents($file)));
		}
		
		$featuretoggle->setSettings($settings);
	}
	
	protected function _initEnablePlugins(){
		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Speedy_Plugins_Maintenance());
	}
}

