<?php

namespace App\Controllers\Admin;

use App\Helpers\Auth;

/**
 * Only Views template
 */
class AdminController extends \Core\Controller
{
    // construct auth
    private $template = 'admin';

    public function __construct()
    {
        parent::__construct();
        // Auth::requireAdmin();
    }

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
        return $this->render('admin/create-main', ['title' => 'Создать главное событие'], $this->template);
    }

    public function events()
    {
        return $this->render('admin/events', ['title' => 'Управление всеми событиями'], $this->template);
    }

    public function mainEvents()
    {
        return $this->render('admin/main-events', ['title' => 'Управление главными событиями'], $this->template);
    }

    public function persons()
    {
        return $this->render('admin/persons', ['title' => 'Управление пользователями'], $this->template);
    }

    public function testFetch()
    {
        return $this->render('test/test-handler-data', ['title' => 'шаблон для тестирования api'], $this->template);
    }
}
