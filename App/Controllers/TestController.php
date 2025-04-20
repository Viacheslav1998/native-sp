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

    public function testDataArrayToString()
    {
        $status_code = http_response_code(200);

        $examp = "examp";

        $staff = [$examp, "status", $status_code];

        $stmt = [$mew, $build] = explode(",", implode(",", $staff));
   
        print_r($stmt);
    }


}
