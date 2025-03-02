<?php

namespace App\Helpers;

class ViewRenderer
{

  /**
   * if file exists
   * return @param bool  
   */
  public function viewExists(string $view): bool
  {
    return file_exists(__DIR__ . "/../Views/$view.php");
  }


  /**
   * require $view / or 404
   * and converts the data for use in the template
   */
  public function render(string $view, array $data)
  {
    extract($data);

    if(!$this->viewExists($view))
    {
      require __DIR__. "/../../App/Views/base/404.php";
      return;
    }

    require __DIR__ . "/../../App/Views/$view.php";
  } 

}