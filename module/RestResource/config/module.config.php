<?php
return array(
		'phlyrestfully' => array(
    		'resources' => array(
				'RestResource\ApiController' => array(
					'identifier'              => 'Pastes',
					'listener'                => 'RestResource\PasteResourceListener',
					'resource_identifiers'    => array('PasteResource'),
					'collection_http_options' => array('get', 'post'),
					'collection_name'         => 'pastes',
					'page_size'               => 10,
					'resource_http_options'   => array('get'),
					'route_name'              => 'paste/api',
				),
			),
		),
		'router' => array('routes' => array(
        	'paste' => array(
        	    'type' => 'Literal',
        	    'options' => array(
        	        'route' => '/paste',
        	        'defaults' => array(
        	            'controller' => 'RestResource\PasteController', // for the web UI
        	        )
        	    ),
            	'may_terminate' => true,
            	'child_routes' => array(
            	    'api' => array(
            	        'type' => 'Segment',
            	        'options' => array(
            	            'route'      => '/api/pastes[/:id]',
            	            'defaults' => array(
            	                'controller' => 'RestResource\ApiController',
            	            )
            	        ),
            	    ),
            	),
        	),
    )),
	'service_manager' => array(
		'factories' => array(
			'PastePersistence' => function (Zend\ServiceManager\ServiceManager $serviceManager) {
				$persistence = new Paste\PersistenceImplementation();
				$persistence->setServiceLocator($serviceManager);
				return $persistence;
			}
		),
	),
);
