<?php

namespace App\Controllers;

use Core\Controller;

class TestController extends Controller
{
    public function testError()
    {
        throw new \Exception('text error 500');
    }

    public function testFetch()
    {
        return $this->render('test/test-handler-data', ['title' => 'test'], 'admin');
    }
}
