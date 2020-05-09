<?php
// Turn on Error Reporting
error_reporting(E_ALL);

// Start Session
session_start();

// Require Functions.php
require 'functions.php';

// Initialize Cart
$cart = [];

if (isset($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
}

// Items in Cart
$itemsInCart = 0;
// Total Cost
$totalCost = 0;

foreach($cart as $item) {
  $itemsInCart += $item['quantity'];
  $totalCost += $item['price'];
}

// Products Array
$products = require 'data/products.php';

// Get Action (GET/POST)
$action = (!empty($_GET['action'])) ? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) :
  filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

// Ghetto Router
switch($action) {
  case 'view-cart':
    require 'views/cart.php';
    exit;
  break;
  case 'checkout':
    require 'views/checkout.php';
    exit;
  break;
  case 'checkout-action':
    // Process Address Form
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $line1 = filter_input(INPUT_POST, 'line1', FILTER_SANITIZE_STRING);
    $line2 = filter_input(INPUT_POST, 'line2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);

    // Ensure all required fields are filled.
    if (empty($name) || empty($line1) || empty($city) || empty($state) || empty($country) || empty($zip)) {
      $msg = "Please fill out all required fields.";
      require 'views/checkout.php';
      exit;
    }

    // Store the Address in the Session
    $_SESSION['address'] = [
      'name' => $name,
      'line1' => $line1,
      'line2' => (!empty($line2)) ? $line2 : null,
      'city' => $city,
      'state' => $state,
      'country' => $country,
      'zip' => $zip
    ];

    redirect('/?action=confirm');
  break;
  case 'confirm':
    if (isset($_SESSION['address'])) $address = $_SESSION['address'];
    else redirect('/');

    // Store Purchases from Cart
    $purchases = $cart;

    // Empty Cart
    $cart = [];
    // Items in Cart
    $itemsInCart = 0;
    // Total Cost
    $totalCost = 0;

    require 'views/confirm.php';
    exit;
  break;
  case 'add-item':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
    $redirect_uri = filter_input(INPUT_POST, 'uri', FILTER_SANITIZE_STRING);

    if (empty($id) || empty($quantity)) {
      redirect($_SERVER['REQUEST_URI']);
    }

    $index = array_search($id, array_column($cart, 'id'));

    if ($index !== false) {
      $cart[$index]['quantity'] += $quantity;
      $cart[$index]['price'] = $cart[$index]['cost_per_unit'] * $cart[$index]['quantity'];
    } else {
      $item = $products[array_search($id, array_column($products, 'id'))];
      $item['quantity'] = $quantity;
      $item['price'] = $item['cost_per_unit'] * $quantity;

      $cart[] = $item;
    }
    $_SESSION['cart'] = $cart;

    if (!empty($redirect_uri)) {
      redirect($redirect_uri, $msg = "$item[name] added to cart.");
    }

    redirect($_SERVER['REQUEST_URI'], "$item[name] added to cart.");
  break;
  case 'remove-item':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);

    if (empty($id)) {
      redirect($_SERVER['REQUEST_URI']);
    }

    $index = array_search($id, array_column($cart, 'id'));

    if ($index !== false) {
      $item = &$cart[$index];
      if ($item['quantity'] > $quantity) {
        $cart[$index]['quantity'] -= $quantity;
        $cart[$index]['price'] = $cart[$index]['cost_per_unit'] * $cart[$index]['quantity'];
      } else {
        array_splice($cart, $index, 1);
      }
    }
    $_SESSION['cart'] = $cart;

    if (count($cart) != 0) {
      redirect('/?action=view-cart', "Item removed from cart.");
    }

    redirect($_SERVER['REQUEST_URI'], "Your cart is empty.");
  break;
  case 'empty-cart':
    if (!empty($_SESSION['address'])) {
      unset($_SESSION['address']);
    }
    unset($_SESSION['cart']);

    redirect('/');
  break;
  default:
    require 'views/store.php';
  break;
}

?>