<?php

namespace App\Controllers;

use App\Helpers\Request;

class RegisterController extends \Core\Controller 
{
    /**
     * save person
     */
    public function save()
    {
      /** 
       * // array $data :bool
        name: name, 
        lastName: lastName,
        email: email, 
        town: town,
        phone: phone,
        password: password
       */
       
       $data = Request::postJson();
       var_dump($data);
       die();

        try {
            $saved = $this->crudService->create([
                $name = $_POST['name']
            ]);
        } catch (\Throwable $th) {
          //throw $th;
        }
    }

}