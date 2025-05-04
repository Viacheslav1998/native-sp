<?php

namespace Core;

use App\Helpers\ViewRenderer;

class Controller
{
    protected ViewRenderer $viewRenderer;

    public function __construct()
    {
        $this->viewRenderer = new ViewRenderer();
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
     * base try/catch handler
     * wrapper handler
     */
    protected function jsonResponse(callable $callback)
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $result = callback();
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            // RETURN ?
        } catch (\PDOException $e) {
            if(str_contains($e->getMessage(), '1062')) {
                http_response_code(422);
                echo json_encode([
                    'success' => fasle,
                    'message' => 'пользователь с такой почтой уже есть!',
                    'field' => 'email'
                ], JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(500);
                echo json_encode([
                    'success' => false,
                    'message' => 'ошибка базы данных',
                    // 'error' => $e->getMessage()
                ], JSON_UNESCAPED_UNICODE);
            } 
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false, 
                'message' => 'что то пошло не так',
                // 'error' => $e->getMessage();
            ], JSON_UNESCAPED_UNICODE);
        }
    } 
}
