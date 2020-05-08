<?php
/** 
 * A Shopping Cart Application
*/

error_reporting(E_ALL);

echo $_SERVER['REQUEST_URI'];

// Require Helper Function File
require 'functions.php';

// Require Class Files
require 'models/Inventory.php';
require 'models/Cart.php';

// Start or Resume Session
session_start();

$inventory = new Inventory(require 'data/product_data.php');

if (!isset($_SESSION['cart'])) {
  // Instantiate an Empty Shopping Cart
  $cart = new Cart([]);
} else {
  // Instantiate a new Shopping Cart with Session Data
  $cart = new Cart($_SESSION['cart']);
}

// Ghetto Router

// ROUTES || ACTIONS
$routes = [
    /** 
     * Store Page
    */
    'store' => function($cart, $inventory) {
      return page('store', [
        'title' => 'Browse Items',
        'inventory' => $inventory,
        'cart' => $cart
      ]);
    },
    /** 
     * Cart Page
    */
    'cart' => function($cart, $inventory) {
      return page('cart', [
        'title' => 'View Cart',
        'inventory' => $inventory,
        'cart' => $cart
      ]);
    },
    /**
     * Check Out
    */
    'checkout' => function($cart, $inventory) {
      return page('checkout', [
        'title' => 'Checkout',
        'inventory' => $inventory->items(),
        'cart' => $cart
      ]);
    },
    /** 
     * Confirm Purchase
    */
    'confirm' => function($cart, $inventory) {
      return page('confirm', [
        'title' => 'Confirm Order',
        'products' => $inventory->items(),
        'cart' => $cart
      ]);
    },
    /**
     * Add Item to Shopping Cart
     */
    'add-item' => function($cart, $inventory) {
      $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      $item = $inventory->item($id);
      
      // Add Item to Cart
      $cart->add($item);

      // Persist the Cart Items
      $cart->save();

      // Redirect
      return redirect($_SERVER['REQUEST_URI'], $item['name'] . ' added to Cart');
    },
    /** 
     * Remove Item from Shopping Cart
    */
    'remove-item' => function($cart, $inventory) {
      $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      $item = $inventory->item($id);

      if (!empty($cart->item($item['id']))) {
        $cart->remove($item);
        // Persist the Cart Items
        $cart->save();
      }

      // Redirect to Store Page
      return redirect($_SERVER['REQUEST_URI'], $item['name'] . ' added to Cart');
      exit();
    },
    /**
     * Empty Shopping Cart
    */
    'empty-cart' => function($cart, $inventory) {
      // Empty the Cart
      session_destroy();

      // Return to Store
      return redirect('/');
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
  $routes[$action]($cart, $inventory);
} else {
  $routes[$defaultAction]($cart, $inventory);
}