<?php
require_once("bootstrap.php");

try {
  router();
} catch (Exception $e) {
  var_dump($e->getMessage());
}

echo  ' --dia lindo ' . CONTROLLER_PATH . '<hr/>';
