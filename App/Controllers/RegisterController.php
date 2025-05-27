<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Model\Resources\RegisterResource;

class RegisterController extends \Core\Controller 
{
    private RegisterResource $register;

    public function __construct()
    {
        parent::__construct();
        $this->register = new RegisterResource();
    }
   

    /**
     * save person
     */
    public function save()
    {  
        $data = Request::postJson();
        error_log($data);
        return $this->register->save($data);
    }

}