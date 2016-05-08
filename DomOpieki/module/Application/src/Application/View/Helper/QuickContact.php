<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 4/9/2016
 * Time: 8:38 PM
 */

namespace Application\View\Helper;
use Zend\View\Helper\AbstractHelper;

class QuickContact extends AbstractHelper
{
    protected $count = 0;

    public function __invoke($string)
    {
        $start='<div id="quick_contact_start">start</div>';
        $end='<div id="quick_contact_end">end</div>';
        $whereStart=strpos($string, $start)+strlen($start);
        $howLong=strpos($string, $end) - $whereStart;
        $temp = substr($string,$whereStart,$howLong);
        return $temp;
    }
}