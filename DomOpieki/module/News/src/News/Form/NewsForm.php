<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 5:29 PM
 */

namespace News\Form;

use Zend\Form\Form;

class NewsForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('adminNews');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Tytuł',
            ),
        ));
        $this->add(array(
            'name' => 'imgUrl',
            'type' => 'Text',
            'options' => array(
                'label' => 'Linki do obrazków',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Opis',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Wyślij',
                'id' => 'submitbutton',
            ),
        ));
    }
}