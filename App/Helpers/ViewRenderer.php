<?php

namespace App\Helpers;

class ViewRenderer
{
    private string $viewsPath = __DIR__ . '/../Views/';

    /**
     * if file exists
     * return @param bool
     */
    public function viewExists(string $view): bool
    {
        return file_exists($this->viewsPath . "$view.php");
    }

    /**
     * require $view / or 404
     * and converts the data for use in the template
     * the main template is used by default
     */
    public function render(string $view, array $data = [], string $layout = 'main'): void
    {
        extract($data);

        try {
            if (!$this->viewExists($view)) {
                throw new \Exception("View not found: $view");
            }

            $content = $this->viewsPath . "$view.php";
        } catch (\Exception $e) {
            $content = $this->viewsPath . 'base/404.php';
        }

        require $this->viewsPath . "layouts/$layout.php";
    }

}


