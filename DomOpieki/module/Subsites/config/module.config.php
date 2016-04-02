<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Subsites\Controller\Subsites' => 'Subsites\Controller\SubsitesController',
            'Subsites\Controller\Public' => 'Subsites\Controller\PublicController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'adminSubsites' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/subsites[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Subsites\Controller\Subsites',
                        'action'     => 'index',
                    ),
                ),
            ),
            'subsites' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/subsites[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Subsites\Controller\Public',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'subsites' => __DIR__ . '/../view',
        ),
    ),
);