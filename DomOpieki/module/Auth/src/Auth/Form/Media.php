<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/8/2016
 * Time: 7:50 AM
 */


namespace Auth\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Media extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
    }

    public function addElements()
    {
        // File Input
        $file = new Element\File('image-file');
        $file->setLabel('Wczytaj Plik')
            ->setAttribute('id', 'image-file');
        $this->add($file);
    }
}