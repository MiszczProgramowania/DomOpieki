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

            // grab the paginator from the AlbumTable
            $paginator = $this->getNewsTable()->fetchAll(true);
            // set the current page to what has been passed in query string, or to 1 if none set
            $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
            // set the number of items per page to 10
            $paginator->setItemCountPerPage(5);

            return new ViewModel(array(
                'paginator' => $paginator
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