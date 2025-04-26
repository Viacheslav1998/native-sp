<?php

namespace App\Controllers\Resources;

class TestResource
{
  public function index()
  {
      // header('Content-Type: application/json; charset=utf-8');

      // get all data
      // $data = [
      //   'name' => $_POST['name'] ?? '',
      //   'email' => $_POST['email'] ?? '',
      //   'title' => $_POST['email'] ?? '',
      //   'date' => $_POST['date'] ?? '',
      //   'description' => $_POST['description'] ?? '',
      //   'assessment' => $_POST['assessment'] ?? '',
      // ];

      // echo json_encode([
      //     'status' => 'ok',
      //     'data' => $data
      // ]);
  }     


  public function getTestDataOneMoreTime()
  {
    header('Content-Type: application/json; charset=utf-8');

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
  // public function create(){}     // form create (GET)
  // public function store(){}      // save data (POST)
  // public function show($id){}    // show one (GET)
  // public function edit($id){}    // form edit (GET)
  // public function update($id){}  // update/fresh (PUT/PATCH)
  // public function destroy($id){} // delete (DELETE)
}