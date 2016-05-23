<?php


namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use News\Model\News;          // <-- Add this import
use News\Form\NewsForm;

class NewsController extends AbstractActionController
{
    protected $newsTable;

 
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
            'news' => $this->getNewsTable()->fetchAll(),
        ));
        }
    }

    public function addAction()
    {
        if($this->checkForAdmin()) {
            $form = new NewsForm();
            $form->get('submit')->setValue('Add');

            $request = $this->getRequest();
            if ($request->isPost()) {
                $news = new News();
                $form->setInputFilter($news->getInputFilter());
                $form->setData($request->getPost());

                if ($form->isValid()) {
                    $news->exchangeArray($form->getData());
                    $this->getNewsTable()->saveNews($news);
                    // Redirect to list of news
                    return $this->redirect()->toRoute('adminNews');
                }
            }
            return array('form' => $form);
        }
    }

    public function editAction()
    {
        $this->checkForAdmin();
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('adminNews', array(
                'action' => 'add'
            ));
        }
        // Get the News with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $news = $this->getNewsTable()->getNews($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('adminNews', array(
                'action' => 'index'
            ));
        }

        $form  = new NewsForm();
        $form->bind($news);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($news->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getNewsTable()->saveNews($news);

                // Redirect to list of news
                return $this->redirect()->toRoute('adminNews');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $this->checkForAdmin();

        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('adminNews');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Nie');

            if ($del == 'Tak') {
                $id = (int) $request->getPost('id');
                $this->getNewsTable()->deleteNews($id);
            }

            // Redirect to list of newss
            return $this->redirect()->toRoute('adminNews');
        }

        return array(
            'id'    => $id,
            'news' => $this->getNewsTable()->getNews($id)
        );
    }
    public function getNewsTable()
    {
        $this->checkForAdmin();

        if (!$this->newsTable) {
            $sm = $this->getServiceLocator();
            $this->newsTable = $sm->get('News\Model\NewsTable');
        }
        return $this->newsTable;
    }
}