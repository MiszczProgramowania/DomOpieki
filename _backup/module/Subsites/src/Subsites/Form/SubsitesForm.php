<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 5:29 PM
 */

namespace Subsites\Form;

use Zend\Form\Form;

class SubsitesForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('adminSubsites');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Description',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}