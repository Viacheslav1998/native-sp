<?php 

namespace Core;

class Controller
{
    protected function render(string $view, array $data = [])
    {
        extract($data);
        require __DIR__ . "/../Views/$view.php";
    }
}