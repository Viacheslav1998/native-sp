<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Models\Resources\PersonResource;

class LoginController extends \Core\Controller
{
    private PersonResource $person;

    public function __construct()
    {
        parent::__construct();
        $this->person = new PersonResource();
    }

    /**
     * user verification
     */
    public function login()
    {
        $person = Request::postJson();
        xDump($person);
        die();

        if(!$this->person->login($person)) {
            echo json_encode(['error' => 'Пользователь не найден']);
            exit;
        }

        Header('Location: /');
        exit;
    }
}