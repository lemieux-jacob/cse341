<?php
/**
 * Helper Functions
 */

// TODO:: Redundancy in Page/Partial Functions

// Require Page
function page($name, $data = []) {
  extract($data);

  return require "pages/{$name}.php";
}

// Require Partial
function partial($name, $data = []) {
  extract($data);

  return require "shared/{$name}.php";
}

// Get Product Data
function getProducts() {
  return require 'data/product_data.php';
}

// Save Cart State to Session
function saveCart($cart) {
  return $_SESSION['cart'] = $cart;
}

function itemsInCart($cart) {
  $total = 0;
  foreach($cart as $item) {
    $total += $item['quantity'];
  }
  return $total;
}

// Dump and Die (For Debugging)
function dd($var) {
  var_dump($var);
  die();
}