<?php

return [
  // database | generate | create
  'db/generate' => ['DbSetupController', 'generate'],
  'status' => ['DbSetupController', 'status'],

  // start page\get-data
  '/' => ['HomeController', 'index'],
  'home' => ['HomeController', 'index'],
  'about' => ['HomeController', 'about'],
  'contact' => ['HomeController', 'contact'],
  'user/{id}' => ['UserController', 'show'],

  // just test code ...
  'test-array-string' => ['TestController', 'testDataArrayToString'],
  'test-fetch-data' => ['TestController', 'testFetchData'],
  // test fetch api dataForm secret
  'a4min/test-fetch' => ['AdminController', 'testFetch'],


  // AdminPanel need QAuth = sessions
  'a4min/dashboard' => ['Admin\AdminController', 'dashboard'],
  'a4min/form-regular-event' => ['AdminController', 'createRegularForm'],
  'a4min/form-main-event' => ['AdminController', 'createMainForm'],
  'a4min/events' => ['AdminController', 'events'],
  'a4min/main-events' => ['AdminController', 'mainEvents'],
  'a4min/persons' => ['AdminController', 'persons'],

  // event management need QAuth = sessions \Resources
  'a4min/add-event' => ['EventController', 'addEvent'],

  // API
  'api/post-test-data' => ['TestController', 'testIndex'],
  'api/testGetDataOneMoreTime' => ['TestController', 'testGetDataOneMoreTime'],
  'api/testPostTestData' => ['TestController', 'testPostTestData']

  // CRUD - create/read/update/delete ... 
];
