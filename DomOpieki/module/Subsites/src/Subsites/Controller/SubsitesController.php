<?php


namespace Subsites\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Subsites\Model\Subsites;          // <-- Add this import
use Subsites\Form\SubsitesForm;
use Zend\Filter\StripTags;

class SubsitesController extends AbstractActionController
{
    protected $subsitesTable;
    
    public function checkForAdmin()
    {
        $authService = $this->serviceLocator->get('auth_service');
        if (! $authService->hasIdentity()) {
            // if not log in, redirect to login page
            $this->redirect()->toUrl('/login');
        }
        return true;
    }
    public function indexAction()
    {
        if($this->checkForAdmin())
        {
        return new ViewModel(array(
            'subsites' => $this->getSubsitesTable()->fetchAll(),
        ));
        }
    }

    public function addAction()
    {
        $form = new SubsitesForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $subsites = new Subsites();
            $form->setInputFilter($subsites->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $subsites->exchangeArray($form->getData());
                $this->getSubsitesTable()->saveSubsites($subsites);
                // Redirect to list of subsites
                return $this->redirect()->toRoute('adminSubsites');
            }
        }
        return array('form' => $form);

    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('adminSubsites', array(
                'action' => 'add'
            ));
        }

        // Get the Subsites with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $subsites = $this->getSubsitesTable()->getSubsites($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('adminSubsites', array(
                'action' => 'index'
            ));
        }

        $form  = new SubsitesForm();
        $form->bind($subsites);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($subsites->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getSubsitesTable()->saveSubsites($subsites);

                // Redirect to list of subsites
                return $this->redirect()->toRoute('adminSubsites');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('adminSubsites');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Nie');

            if ($del == 'Tak') {
                $id = (int) $request->getPost('id');
                $this->getSubsitesTable()->deleteSubsites($id);
            }

            // Redirect to list of subsitess
            return $this->redirect()->toRoute('adminSubsites');
        }

        return array(
            'id'    => $id,
            'subsites' => $this->getSubsitesTable()->getSubsites($id)
        );
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