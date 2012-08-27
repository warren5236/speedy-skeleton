return array(
	'Deployment_Model_Tasks_Databasediff' => array(
		'description'=>'Database Diffing functions',
		'enabled' => false
	),
	'Deployment_Model_Tasks_Databasepatch' => array(
		'enabled'=> false,
		'description'=>'Database patching script'
	),
	'Deployment_Model_Tasks_Healthcheck' => array(
		'enabled'=> false,
		'description'=>'Site wide Health Check',
		'sites'=>array(	
			'development' => array(
				'enabled'=>true
			)
		)
	)
	
);
