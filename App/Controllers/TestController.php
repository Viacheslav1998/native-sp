<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Validation\TestFormValidators;
use App\Models\Resources\TestResource;

class TestController extends \Core\Controller
{
  private TestResource $testResource;

  public function __construct()
  {
      $validator = new TestFormValidators();
      $this->testResource = new TestResource($validator);
  }
  
  public function testIndex()
  {
      header('Content-Type: application/json; charset=utf-8');
      
      // $data = $_POST;

      $data = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'title' => $_POST['title'] ?? '',
        'date' => $_POST['date'] ?? '',
        'description' => $_POST['description'] ?? '',
        'assessment' => $_POST['assessment'] ?? '',
      ];

      echo json_encode([
          'status' => 'ok',
          'data' => $data
      ]);
  }     

  /**
   * we're getting a php response back.
   */
  public function testGetDataOneMoreTime()
  {
    header('Content-Type: application/json; charset=utf-8');

    // getting data
    $data = [
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? '',
      'title' => $_POST['title'] ?? '',
      'age' => $_POST['age'] ?? ''
    ];

    echo json_encode([
      'status' => 'ok',
      'data' => $data
    ]);
  }

  /**
   * the First method to Save test data
   */
  public function testPostTestData()
  {
    $this->jsonResponse(function () {
      $data = Request::post();
      $this->testResource->save($data);
    });
  }



  // public function create(){}     // form create (GET)
  // public function store(){}      // save data (POST)
  // public function show($id){}    // show one (GET)
  // public function edit($id){}    // form edit (GET)
  // public function update($id){}  // update/fresh (PUT/PATCH)
  // public function destroy($id){} // delete (DELETE)
}