<?php
require_once("bootstrap.php");

try {
  $data = router();
  extract($data['data']);

  if (!isset($data['data'])) {
    throw new Exception("Error, informations not found", 1);
  }

  if (!isset($data['view'])) {
    throw new Exception("Error, view not found", 1);
  }

  if (!file_exists(VIEWS . $data['view'])) {
    throw new Exception("Error, view {$data['view']} not found", 1);
  }

  $view = $data['view'];

  require VIEWS . 'master.php';
} catch (Exception $e) {
  var_dump($e->getMessage());
}
