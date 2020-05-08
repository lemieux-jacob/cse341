<?php
/**
 * Helper Functions
 */

// Require Page from Pages Folder
function page($name, $data = []) {
  extract($data);
  
  // Check Session for Messages
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $_SESSION['message'] = null;
  }

  // Display the indicated Page/View
  return require "pages/{$name}.php";
}

// Require Partial from Partials Folder
function partial($name, $data = []) {
  extract($data);

  return require "shared/{$name}.php";
}

// Dump and Die (For Debugging)
function dd($var) {
  var_dump($var);
  die();
}

function redirect($uri, $message = null) {
  if ($message) {
    $_SESSION['message'] = $message;
  }
  header('Location: ' . $uri);
  exit;
}