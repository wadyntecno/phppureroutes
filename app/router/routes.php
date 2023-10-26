<?php
require_once "routesFunction.php";

return [
  '/' => 'HomeController@index',
  index_f('user') => "UseController@index",
  create_f('user') => "UserController@create",
  show_f('user') => "UserController@show",
  update_f('user') => "UserController@update",
];
