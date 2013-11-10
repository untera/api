<?php
return array(
		'phlyrestfully' => array(
    		'resources' => array(
				'Paste\ApiController' => array(
					'identifier'              => 'Pastes',
					'listener'                => 'Paste\Listener\PasteResourceListener',
					//'resource_identifiers'    => array('PasteResource'),
					'collection_http_options' => array('get', 'post'),
					//'collection_query_whitelist' => array('description','a'),
					'collection_name'         => 'pastes',
					'page_size'               => 2,
					'resource_http_options'   => array('get','put','post','delete'),
					'route_name'              => 'paste/api',
// 					'accept_criteria' => array(
// 							'PhlyRestfully\View\RestfulJsonModel' => array(
// 									'application/json',
// 									'text/json',
// 							),
// 					),
				),
			),
			'renderer' => array(
				'default_hydrator' => 'ArraySerializable',
				'hydrators' => array(
					'Mapper\Entity\Item' => 'PasteHydrator1',
				),
			),
		),
		'hydrators' => array(
			'invokables' => array(
						'PasteHydrator1' => 'Paste\Hydrator\PasteHydrator',
			),
			'initializers' => array(
				function ($instance, $pluginManager) {
					if (!$instance instanceof \Zend\ServiceManager\ServiceLocatorAwareInterface) {
						return;
					}
					$instance->setPluginManager($pluginManager);
				},
			),
		),
		'router' => array('routes' => array(
        	'paste' => array(
        	    'type' => 'Literal',
        	    'options' => array(
        	        'route' => '/paste',
        	        'defaults' => array(
        	            'controller' => 'Paste\PasteController', // for the web UI
        	        )
        	    ),
            	'may_terminate' => true,
            	'child_routes' => array(
            	    'api' => array(
            	        'type' => 'Segment',
            	        'options' => array(
            	            'route'      => '/api/pastes[/:id]',
            	            'defaults' => array(
            	                'controller' => 'Paste\ApiController',
            	            )
            	        ),
            	    ),
            	),
        	),
    )),
	'service_manager' => array(
		'invokables' => array(
			'PersistenceImplementation' =>'Paste\Dao\PersistenceImplementation'
		),
		'factories' => array(
					'Paste\Listener\PasteResourceListener' => function ($services) {
						$persistence = $services->get('PersistenceImplementation');
						return new Paste\Listener\PasteResourceListener($persistence);
					},
		)
	),
	'initializers' => function ($instance, $sm) {
			if ($instance instanceof Zend\ServiceManager\ServiceLocatorAwareInterface) {
				$instance->setServiceLocator($sm);
			}
	},
);
