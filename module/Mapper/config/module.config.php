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
    ),                
);
