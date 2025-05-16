<?php

namespace App\Controllers\Errors;

use Core\Controller;

class ErrorController extends Controller
{
    /**
     * if no match or route is found
     * return error code in the template
     */
    public function notFound()
    {
        header('Content-Type: text/html; charset=utf-8');

        http_response_code(404);

        error_log("404 Not Found: " . $_SERVER['REQUEST_URI']);

        return $this->render('base/404');
    }

    /**
     * server error - and something's broken.
     */
    public function serverError()
    {   
        header('Content-Type: text/html; charset=utf-8');

        http_response_code(500);

        return $this->render('base/500');
    }
}
