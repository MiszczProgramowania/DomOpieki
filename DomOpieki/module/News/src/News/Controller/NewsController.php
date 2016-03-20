<?php


namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use News\Model\News;          // <-- Add this import
use News\Form\NewsForm;

class NewsController extends AbstractActionController
{
    protected $newsTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'news' => $this->getNewsTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
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
                return $this->redirect()->toRoute('news');
            }
        }
        return array('form' => $form);

    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('news', array(
                'action' => 'add'
            ));
        }

        // Get the News with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $news = $this->getNewsTable()->getNews($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('news', array(
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
                return $this->redirect()->toRoute('news');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
    }
    public function getNewsTable()
    {
        if (!$this->newsTable) {
            $sm = $this->getServiceLocator();
            $this->newsTable = $sm->get('News\Model\NewsTable');
        }
        return $this->newsTable;
    }
}