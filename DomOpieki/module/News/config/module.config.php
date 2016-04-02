<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'News\Controller\News' => 'News\Controller\NewsController',
            'News\Controller\Public' => 'News\Controller\PublicController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'adminNews' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/news[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'News\Controller\News',
                        'action'     => 'index',
                    ),
                ),
            ),
            'news' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/news',
                    'defaults' => array(
                        'controller' => 'News\Controller\Public',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'news' => __DIR__ . '/../view',
        ),
    ),
);