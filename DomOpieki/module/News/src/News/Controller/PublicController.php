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

    private function shorter($text, $chars_limit)
    {
        // Check if length is larger than the character limit
        if (strlen($text) > $chars_limit)
        {
            // If so, cut the string at the character limit
            $new_text = substr($text, 0, $chars_limit);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            return $new_text . "...";
        }
        // If not just return the text as is
        else
        {
            return $text;
        }
    }
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