<?php
/** 
 * A Shopping Cart Application
*/

error_reporting(E_ALL);

// Helper Function File
require 'functions.php';

// Start or Resume Session
session_start();

if (!isset($_SESSION['cart'])) {
  // Instantiate an Empty Shopping Cart
  $cart = [];
} else {
  // Instantiate a new Shopping Cart with Session Data
  $cart = $_SESSION['cart'];
}

// Ghetto Router

// ROUTES
$routes = [
    'store' => function($cart) {
      return page('store', [
        'title' => 'Browse Items',
        'products' => getProducts(),
        'itemCount' => itemsInCart($cart),
        'cart' => $cart
      ]);
    },
    'cart' => function($cart) {
      return page('cart', [
        'title' => 'View Cart',
        'products' => getProducts(),
        'cart' => $cart
      ]);
    },
    'checkout' => function($cart) {
      return page('checkout', [
        'title' => 'Checkout',
        'products' => getProducts(),
        'cart' => $cart
      ]);
    },
    'confirm' => function($cart) {
      return page('confirm', [
        'title' => 'Confirm Order',
        'products' => getProducts(),
        'cart' => $cart
      ]);
    },
    /**
     * Add Item to Shopping Cart
     */
    'add-item' => function($cart) {
      $post_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      $products = getProducts();
      $item_index = array_search($post_id, array_column($products, 'id'));

      $existing_item_index = array_search($post_id, array_column($cart, 'id'));

      if ($existing_item_index !== false) {
        $cart[$existing_item_index]['quantity']++;
      } else {
        $cart[] = ['id' => $post_id, 'quantity' => 1];
      }

      // Persist the Cart Items
      saveCart($cart);

      // Redirect
      header('Location: ' . $_SERVER['REQUEST_URI']);
      exit();
    },
    /** 
     * Remove Item from Shopping Cart
    */
    'remove-item' => function($cart) {
      $post_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
      $item_index = array_search($post_id, array_column($cart, 'id'));

      if ($item_index !== false) {
        if (empty($quantity)) {
          unset($cart[$item_index]);
        } else {
          $cart[$item_index]['quantity']--;
        }
        // Persist the Cart Items
        saveCart($cart);
      }

      // Redirect
      header('Location: ' . $_SERVER['REQUEST_URI']);
      exit();
    },
    /**
     * Empty Shopping Cart
    */
    'empty-cart' => function($cart) {
      // Empty the Cart
      session_destroy();
      header('Location: /');
      exit();
    }
];

// Initialize Action Variable
$action = '';

// Set Default Action
$defaultAction = 'store';

// Check GET/POST for Action
if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}

// Call Action Function
if (array_key_exists($action, $routes)) {
  $routes[$action]($cart);
} else {
  $routes[$defaultAction]($cart);
}