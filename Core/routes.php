<?php

return [
  '/' => ['HomeController', 'index'],
  'home' => ['HomeController', 'index'],
  'about' => ['HomeController', 'about'],
  'contact' => ['HomeController', 'contact'],
  'user/{id}' => ['UserController', 'show'],
  'testError' => ['TestController', 'testError'],

  // AdminPanel need QAuth = sessions
  'a4min/dashboard' => ['AdminController', 'dashboard'],
  'a4min/add' => ['AdminController', 'create'],
  'a4min/events' => ['AdminController', 'events'],
  'a4min/persons' => ['AdminController', 'persons'],
];
