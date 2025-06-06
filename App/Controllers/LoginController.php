<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Helpers\Response;
use App\Models\Resources\PersonResource;

class LoginController extends \Core\Controller
{
    private PersonResource $person;
    protected Response $response;

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
        $data = Request::postJson();

        if(!$this->person->verify($data)) {
           // вероятно нужно вернуть джэйсон респонс 
           // но лучше в ресурсе персон создать логин\verify метод и там делать проверку 
            echo json_encode(['error' => 'Пользователь не найден']);
            exit;
        }

        // проверка на соответствии только нужно получить данные

    }
}