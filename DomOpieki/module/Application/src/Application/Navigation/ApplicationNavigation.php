<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/2/2016
 * Time: 7:24 PM
 */
namespace Application\Navigation;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class ApplicationNavigation extends DefaultNavigationFactory
{
    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = array();

        if (null === $this->pages) {
            $pages = $serviceLocator->get('Subsites\Model\SubsitesTable')->fetchAll();

            if ($pages) { // ResultSet
                foreach ($pages as $key => $page) {
                    $navigation[] = array(
                        'label' => $page->title,
                        'uri'   => $page->url
                    );
                }
            }

            $mvcEvent = $serviceLocator->get('Application')
                ->getMvcEvent();

            $routeMatch = $mvcEvent->getRouteMatch();
            $router     = $mvcEvent->getRouter();
            $pages      = $this->getPagesFromConfig($navigation);

            $this->pages = $this->injectComponents(
                $pages,
                $routeMatch,
                $router
            );
        }

        return $this->pages;
    }
}