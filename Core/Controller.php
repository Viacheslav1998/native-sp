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
    
            if (!is_array($result)) {
                throw new \RuntimeException('Callback должен возвращать массив, а не null или что-то другое');
            }
    
            $this->response->json($result);
    
        } catch (\Throwable $e) {
            error_log('FATAL JSON ERROR: ' . $e->getMessage());
    
            $this->response->json([
                'success' => false,
                'message' => 'Произошла ошибка.',
                // 'debug_mode' => 'Системная ошибка: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
}
