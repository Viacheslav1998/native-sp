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

  public function createRegularForm()
  {
    return $this->render('admin/create', ['title' => 'Создать простое собатие'], $this->template);
  }

  public function createMainForm()
  {
    return $this->render('admin/create-main', ['title' => 'Создать главное событие'], $this->remplate);
  }

}