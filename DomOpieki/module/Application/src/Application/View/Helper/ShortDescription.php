<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/9/2016
 * Time: 8:38 PM
 */

namespace Application\View\Helper;
use Zend\View\Helper\AbstractHelper;

class ShortDescription extends AbstractHelper
{
    protected $count = 0;

    public function __invoke($string, $length)
    {
        if(strlen($string) > $length)
        {
             return substr($string,0,$length).' ... ';
        }
        else
        {
            return $string;
        }
    }
}