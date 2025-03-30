<?php

namespace App\Controllers;

class AdminController extends \Core\Controller
{
  // construct auth


  public function dashboard()
  {
    return $this->render('admin/dashboard', ['title' => 'Добро пожаловать в админку'], 'admin');
  }
}