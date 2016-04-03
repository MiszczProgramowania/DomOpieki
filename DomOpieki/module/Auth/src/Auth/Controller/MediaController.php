<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/3/2016
 * Time: 1:34 PM
 */

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; // <-- Add this import
use Auth\Form\Media;

class MediaController extends AbstractActionController
{
    public function indexAction()
    {
       
        return new ViewModel();
    }
    public function uploadFormAction()
    {
        $form = new Media('upload-form');

        $request = $this->getRequest();
        if ($request->isPost()) {
            // Make certain to merge the files info!
            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $form->setData($post);
            if ($form->isValid()) {
                $data = $form->getData();
                // Form is valid, save the form!
                return $this->redirect()->toRoute('upload-form/success');
            }
        }

        return array('form' => $form);
    }
}