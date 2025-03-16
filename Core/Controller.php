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

    protected function render(string $view, array $data = [])
    {
        $this->viewRenderer->render($view, $data);
    }
}
