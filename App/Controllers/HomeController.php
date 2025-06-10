<?php

namespace App\Controllers;

use Core\Controller;
use App\Traits\RequireAuth;

class HomeController extends Controller
{
    use RequireAuth;

    public function index()
    {
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
        $this->denyIfAdmin();
        return $this->render('login', ['title' => 'Система входа']);
    }

    public function register()
    {
        $this->denyIfAdmin();
        return $this->render('register', ['title' => 'Система регистрации']);
    }
}
