<?php

namespace App\Helpers;

class ViewRenderer
{

  private string $viewsPath = __DIR__ . "/../Views/";

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
   */
  public function render(string $view, array $data = []): void
  {
    extract($data);

    if(!$this->viewExists($view))
    {
      require $this->viewsPath . "base/404.php";
      return;
    }

    // plug in the main template 
    $content = $this->viewsPath . "$view.php";
    require $this->viewsPath . "layouts/main.php";
  } 

}