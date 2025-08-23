<?php

namespace App\Controllers\Admin;

use App\Helpers\Auth;
use App\Traits\RequireAuth;

/**
 * Only Views template
 */
class AdminController extends \Core\Controller
{

     use RequireAuth;

    // construct auth
    private $template = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->denyIfGuest();
    }

    public function dashboard()
    {
        $name = Auth::getUser();

        return $this->render(
            'admin/dashboard',
            [
                'title' => 'Добро пожаловать в админку',
                'name' => $name,
            ],
            $this->template
        );
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

    public function profile()
    {
        Auth::requireUser();
        $name = Auth::getUser();
        
        return $this->render(
            'admin/profile',
            [
                'title' => 'профиль пользователя',
                'name' => $name,
            ],
            $this->template
        );
    }

    public function testFetch()
    {
        return $this->render('test/test-handler-data', ['title' => 'шаблон для тестирования api'], $this->template);
    }
}
