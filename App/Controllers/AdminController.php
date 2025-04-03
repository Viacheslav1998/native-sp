<?php

namespace App\Controllers;

class AdminController extends \Core\Controller
{
  // construct auth
  private $template = 'admin';

  public function dashboard()
  {
    return $this->render('admin/dashboard', ['title' => 'Добро пожаловать в админку'], $this->template);
  }

  public function create()
  {
    return $this->render('admin/create', ['title' => 'Создать нового пользователя'], $this->template);
  }


}