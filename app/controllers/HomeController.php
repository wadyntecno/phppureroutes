<?php

namespace app\controllers;

class HomeController
{
  public function __construct()
  {
  }
  public function index($params)
  {
    var_dump($params);
    die();
  }
}
