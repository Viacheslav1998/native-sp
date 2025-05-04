<?php

namespace Core;

use App\Helpers\ViewRenderer;
use App\Helpers\Response;

class Controller
{
    protected ViewRenderer $viewRenderer;
    protected Response $response;

    public function __construct()
    {
        $this->viewRenderer = new ViewRenderer();
        $this->response = new Response();
    }

    /**
     * use helper view generation
     * view|data|template name, default = main
     */
    protected function render(string $view, array $data = [], string $layout = 'main')
    {
        $this->viewRenderer->render($view, $data, $layout);
    }

    /**
     * handler json response
     */
    protected function jsonResponse(callable $callback)
    {
        try {
            $result = $callback();
            $this->response->json($result);
        } catch (\Throwable $e) {
            $this->response->json([
                'success' => false, 
                'message' => 'Произошла ошибка.'
            ], 500);
        }
    }
    
}
