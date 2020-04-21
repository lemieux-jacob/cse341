<?php

require_once 'functions.php';

// Ghetto Router

// Routes (Route => Action)
$routes = [
  'home' => function() {
    page('home', ['title' => 'Home']);
  },
  'assignments' => function() {
    page('assignments', ['title' => 'Assignments']);
  }
];

// Initialize Action Variable
$action = 'home'; // Set Default Action to Home Page

if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}

// Call the Function Associated with the selected Route if it exists
if (array_key_exists($action, $routes)) {
  $routes[$action]();
}