<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Models\Resources\LoginResource;

class LoginController extends \Core\Controller
{
    private LoginResource $person;

    public function __construct()
    {
        parent::__construct();
        $this->person = new LoginResource();
    }

    /**
     * user verification
     */
    public function login()
    {
        $data = Request::postJson();
        $this->person->verify($data);
        exit;
    }
}