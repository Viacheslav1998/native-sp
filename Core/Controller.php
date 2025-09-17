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
}
