return array(
	'siteheader' => array(
		'description'=>'Site specific header information',
		'enabled' => false
	),
	'help' => array(
		'description'=>'The help module',
		'enabled' => false
	),
	'user' => array(
		'description'=>'The user module',
		'enabled' => false,
		'sites'=>array(
			'development' => array(
				'startDate'=>'2012-09-01'
			)
		)
	)
);
