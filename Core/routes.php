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
  'a4min/form-regular-event' => ['AdminController', 'createRegularForm'],
  'a4min/form-main-event' => ['AdminController', 'createMainForm'],
  'a4min/events' => ['AdminController', 'events'],
  'a4min/main-events' => ['AdminController', 'mainEvents'],
  'a4min/persons' => ['AdminController', 'persons'],

  // event management need QAuth = sessions \Resources
  'a4min/add-event' => ['Resources\\EventResource', 'addEvent'],
];
