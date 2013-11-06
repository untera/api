<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'Mapper_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Mapper/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                     'Mapper\Entity' =>  'Mapper_driver'
                ),
            ),
        ),
		'connection' => array(
			'orm_default' => array(
				'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
					'params' => array(
						'host' => 'localhost',
						'port' => '3306',
						'dbname' => 'untera',
						'user' => 'root',
						'password' => 'root',
					),
				),
			),
		),
);
