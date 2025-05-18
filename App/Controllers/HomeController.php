<?php

namespace App\Controllers;

use Core\Controller;
// use App\Helpers\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // $_SESSION['user']['role'] = 'admin'; присвоить роль для проверки

        // echo $_SESSION['user']['role']; // записать данные в массив юзер
        // unset($_SESSION['user']); удалить в случае ошибки
        return $this->render('home', ['title' => 'Домашняя']);
    }

    public function about()
    {
        return $this->render('about', ['title' => 'О нас']);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function login()
    {
        return $this->render('login', ['title' => 'Система входа']);
    }

    public function register()
    {
        return $this->render('register', ['title' => 'Система регистрации']);
    }
}
