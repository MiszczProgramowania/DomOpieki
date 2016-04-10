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
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/subsites',
                    'defaults' => array(
                        'controller' => 'Subsites\Controller\Public',
                        'action'     => 'index',
                    ),
                ),
            ),
            'site' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/info[/:id]',
                    'constraints' => array(
                        'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Subsites\Controller\Public',
                        'action'     => 'singleUrl',
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
    'view_helpers' => array(
        'invokables' => array(
            'shortDescription' => 'Application\View\Helper\ShortDescription',
        ),
    ),
);