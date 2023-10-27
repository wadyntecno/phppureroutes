<?php

function all($table, $fields = "*"){
  try {
    // return "select {$fields} from `{$table}` ";
    $connect = connect();
    $query = $connect->query("select {$fields} from `{$table}` ");
    return $query->fetchAll();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}
