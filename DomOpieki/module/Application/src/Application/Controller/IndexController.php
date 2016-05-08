<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $newsTable;
    protected $newsSingle;
    protected $subsitesTable;
    protected $subsitesSingle;

    public function indexAction()
    {
        return new ViewModel(array(
            'news' => $this->getNewsTable()->fetchAll(),
            'subsites' => $this->getSubsitesTable()->fetchAll(),
        ));
    }
    public function getNewsTable()
    {
        if (!$this->newsTable) {
            $sm = $this->getServiceLocator();
            $this->newsTable = $sm->get('News\Model\NewsTable');
        }
        return $this->newsTable;
    }
        public function getSubsitesTable()
    {
        if (!$this->subsitesTable) {
            $sm = $this->getServiceLocator();
            $this->subsitesTable = $sm->get('Subsites\Model\SubsitesTable');
        }
        return $this->subsitesTable;
    }
}
