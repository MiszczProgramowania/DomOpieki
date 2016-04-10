<?php
namespace Auth\Model;

class User
{
	public $id;
	
	public $username;
	
	public $password;

    public $url;
	
	public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->password = (isset($data['url'])) ? $data['url'] : null;
    }
}