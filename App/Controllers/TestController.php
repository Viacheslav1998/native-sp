<?php

namespace App\Controllers;

class TestController 
{

  public function testError()
  {
      throw new \Exception('text error 500');
  }

}