<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Models\Resources\PersonResource;

class RegisterController extends \Core\Controller 
{
    private PersonResource $person;

    public function __construct()
    {
        parent::__construct();
        $this->person = new PersonResource();
    }
   

    /**
     * save person
     */
    public function save()
    {  
        $data = Request::postJson();
        return $this->person->save($data);
    }

}