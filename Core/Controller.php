<?php

namespace Core;

use App\Helpers\ViewRenderer;
// use App\Helpers\Response;

class Controller
{
    protected ViewRenderer $viewRenderer;
    // protected Response $response;

    public function __construct()
    {
        $this->viewRenderer = new ViewRenderer();
        // $this->response = new Response();
    }

    /**
     * use helper view generation
     * view|data|template name, default = main
     */
    protected function render(string $view, array $data = [], string $layout = 'main')
    {
        $this->viewRenderer->render($view, $data, $layout);
    }

}
