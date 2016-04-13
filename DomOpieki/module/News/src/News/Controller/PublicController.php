<?php


namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use News\Model\News;          // <-- Add this import
use News\Form\NewsForm;

class PublicController extends AbstractActionController
{
    protected $newsTable;
    protected $newsSingle;

    
    public function indexAction()
    {
            return new ViewModel(array(
                'news' => $this->getNewsTable()->fetchAll(),
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
    public function singleAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->newsSingle = $this->getNewsTable()->getNews($id);
        return new ViewModel(array(
            'news' => $this->newsSingle,
        ));
    }
}