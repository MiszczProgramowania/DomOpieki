<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=15094637_ddp;host=localhost',

    ),
    'navigation' => array(

        // navigation with name default
        'admin' => array(
            array(
                'label' => 'Podstrony',
                'route' => 'adminSubsites',
            ),
            array(
                'label' => 'Aktualności',
                'route' => 'adminNews',
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Navigation\Service\NavigationAbstractServiceFactory'
        ),
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),

    ),
);
