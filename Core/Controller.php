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

    protected function render(string $view, array $data = [], string $layout = 'admin')
    {
        $this->viewRenderer->render($view, $data, $layout);
    }
}
