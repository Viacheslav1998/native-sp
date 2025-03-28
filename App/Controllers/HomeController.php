<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home', ['title' => 'Главная']);
    }

    public function about()
    {
        return $this->render('about', ['title' => 'О нас']);
    }

    public function contact()
    {
        return $this->render('contact');
    }
}
