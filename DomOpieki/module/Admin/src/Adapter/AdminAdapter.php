<?php

/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 8:34 PM
 */

namespace Admin\Adapter;
use Zend\Authentication\Adapter\AdapterInterface;
class AdminAdapter implements AdapterInterface
{
    protected $username;
    protected $password;
    /**
     * Sets username and password for authentication
     *
     * @return void
     */
    public function __construct($username, $password)
{
    $this->username = $username;
    $this->password = $password;
    return;
}

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface
     *               If authentication cannot be performed
     */
    public function authenticate()
{

    $result = $this->getCode();
    if ($result->isValid())
    {
        return $result;
    }

}
}