<?php

return [
  '/' => ['HomeController', 'index'],
  'home' => ['HomeController', 'index'],
  'about' => ['HomeController', 'about'],
  'contact' => ['HomeController', 'contact'],
  'user/{id}' => ['UserController', 'show'],
  'testError' => ['TestController', 'testError'],

  // AdminPanel need QAuth = sessions
  'dashboard' => ['AdminController', 'dashboard'],
];
