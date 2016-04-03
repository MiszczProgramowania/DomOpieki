<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/2/2016
 * Time: 7:23 PM
 */
namespace Application\Navigation;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ApplicationNavigationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new ApplicationNavigation('Zend\Navigation\Default');
        return $navigation->createService($serviceLocator);
    }
}