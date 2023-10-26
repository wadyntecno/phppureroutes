<?php

function index_f($text){
  return "/{$text}/[0-9]+";
}
function create_f($text){
  return "/{$text}/create";
}
function show_f($text){
  return "/{$text}/[0-9]+/name/[a-z]+";
}
function update_f($text){
  return "/{$text}/[0-9]+";
}
