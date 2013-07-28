<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'DoctrineTest\Controller\Skeleton' => 'DoctrineTest\Controller\SkeletonController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'doctrine-test' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/skeleton1',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'DoctrineTest\Controller',
                        'controller'    => 'Skeleton',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'DoctrineTest' => __DIR__ . '/../view',
        ),
    ),
		
		'service_manager' => array(
				// Must be at this level to be seen by $services->get()
				'factories' => array(
						'SkeletonController' => function (Zend\ServiceManager\ServiceManager $serviceManager) {
							$aComponent = new DoctrineTest\Controller\SkeletonController();
							$aComponent->setServiceLocator($serviceManager);
							return $aComponent;
						},
				),
		),
									
						
						
);
