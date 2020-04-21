<?php

function page($page, $data = []) {
  extract($data);

  return require "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page}.php";
}

function partial($partial, $data = []) {
  extract($data);

  return require "{$_SERVER['DOCUMENT_ROOT']}/pages/shared/{$partial}.php";
}