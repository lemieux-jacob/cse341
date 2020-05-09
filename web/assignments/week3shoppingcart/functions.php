<?php
// Redirect w/ Optional Message
function redirect($location, $msg = null) {
  if ($msg) $_SESSION['msg'] = $msg;
  header('Location: '. __DIR__ . $location);
  exit;
}

function formatCurrency($amt) {
  return '$' . number_format($amt, 2);
}

// For Debugging
function dd($var) {
  var_dump($var);
  die();
}