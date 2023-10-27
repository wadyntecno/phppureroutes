<?php

namespace app\controllers;

class HomeController
{
  public function __construct()
  {
  }
  public function index($params)
  {
    $user = all('users','*');
    var_dump($user);
    return  [
      'view' => 'home.php',
      'data' => ['titleView' => 'home']
    ];
  }
}
