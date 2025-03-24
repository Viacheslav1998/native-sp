<?php

namespace App\Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    /**
     * if no match or route is found
     * return error code in the template
     */
    public function notFound()
    {
        http_response_code(404);

        return $this->render('base/404');
    }
 
    /**
     * server error - and something's broken.
     */
    public function serverError()
    {
        http_response_code(500);

        return $this->render('base/500');
    }
}
