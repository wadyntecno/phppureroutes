<?php
require_once("bootstrap.php");

try {
  router();
} catch (Exception $e) {
  var_dump($e->getMessage());
}

echo  ' --comando comum ' . CONTROLLER_PATH . '<hr/>';
