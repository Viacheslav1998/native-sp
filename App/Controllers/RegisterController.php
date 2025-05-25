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
        name: name, 
        lastName: lastName,
        email: email, 
        town: town,
        phone: phone,
        password: password
       */

       echo "123 text 123";
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