<?php

namespace App\Controllers\Resources;

class TestResource
{
  public function testIndex()
  {
      header('Content-Type: application/json; charset=utf-8');
      
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
   * save own test data in database
   */
  public function testPostTestData()
  {
    header('Content-Type: application/json; charset=utf-8');

    $person = [
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? '',
      'population' => $_POST['population'] ?? '2'
    ];

    echo json_encode([
      'status' => 'data have been obtained',
      'person' => $person 
    ]);
  }


  // public function create(){}     // form create (GET)
  // public function store(){}      // save data (POST)
  // public function show($id){}    // show one (GET)
  // public function edit($id){}    // form edit (GET)
  // public function update($id){}  // update/fresh (PUT/PATCH)
  // public function destroy($id){} // delete (DELETE)
}