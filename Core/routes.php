<?php

return [
  // database | generate | create
  'db/generate' => ['Generations\DbSetupController', 'generate'],
  'status' => ['Generations\DbSetupController', 'status'],

  // home for all
  '/' => ['HomeController', 'index'],
  'home' => ['HomeController', 'index'],
  'about' => ['HomeController', 'about'],
  'contact' => ['HomeController', 'contact'],
  'login' => ['HomeController', 'login'],
  'register' => ['HomeController', 'register'],
  'user/{id}' => ['PersonController', 'show'],
  
  // event 
  'events' => ['EventController', 'index'],
  'event/{id}' => ['EventController', 'single'],

  // register / login
  'person/save' => ['RegisterController', 'save'],
  'person/login' => ['LoginController', 'login'],
  
  // just test code ...
  'test-array-string' => ['TestController', 'testDataArrayToString'],
  'test-fetch-data' => ['TestController', 'testFetchData'],
  'test-array-keys' => ['TestController', 'testArrayAllKeys'],
  // test fetch api dataForm secret
  'a4min/test-fetch' => ['Admin\AdminController', 'testFetch'],
  
  // AdminPanel need QAuth = sessions
  'a4min/dashboard' => ['Admin\AdminController', 'dashboard'],
  'a4min/form-regular-event' => ['Admin\AdminController', 'createRegularForm'],
  'a4min/form-main-event' => ['Admin\AdminController', 'createMainForm'],
  'a4min/events' => ['Admin\AdminController', 'events'],
  'a4min/main-events' => ['Admin\AdminController', 'mainEvents'],
  'a4min/persons' => ['Admin\AdminController', 'persons'],
  'a4min/profile' => ['Admin\AdminController', 'profile'],
  // event management need QAuth = sessions \Resources

  // API
  'api/post-test-data' => ['Tests\TestController', 'testIndex'],
  'api/testGetDataOneMoreTime' => ['Tests\TestController', 'testGetDataOneMoreTime'],
  'api/testPostTestData' => ['Tests\TestController', 'testPostTestData'],
  'session/check' => ['Tests\TestController', 'testSession'],
  // CRUD - create/read/update/delete ... 
];
