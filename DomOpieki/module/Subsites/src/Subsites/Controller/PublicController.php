<?php


namespace Subsites\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Subsites\Model\Subsites;          // <-- Add this import
use Subsites\Form\SubsitesForm;

class PublicController extends AbstractActionController
{
    protected $subsitesTable;
    protected $subsitesSingle;

    public function indexAction()
    {
            return new ViewModel(array(
                'subsites' => $this->getSubsitesTable()->fetchAll(),
            ));
    }
    public function getSubsitesTable()
    {
        if (!$this->subsitesTable) {
            $sm = $this->getServiceLocator();
            $this->subsitesTable = $sm->get('Subsites\Model\SubsitesTable');
        }
        return $this->subsitesTable;
    }
    public function singleAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->subsitesSingle = $this->getSubsitesTable()->getSubsites($id);
        return new ViewModel(array(
        'subsite' => $this->subsitesSingle,
    ));
    }
}