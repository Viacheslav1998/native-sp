<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo "Это главная страница"; 
    }

    public function about()
    {
        echo "Это страница о нас";
    }
}