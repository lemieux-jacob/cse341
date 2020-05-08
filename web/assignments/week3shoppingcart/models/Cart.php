<?php
class Cart {
  // Inventory Items
  private $items = [];

  // Initialize Inventory with Items
  function __construct($items) {
    $this->items = $items;
  }
  
  public function items() {
    return $this->items;
  }
  
  // Get Item by ID
  public function item($id) {
    $itemIndex = $this->itemIndex($id);
    if ($itemIndex === false) {
      return false;
    }
    return $this->items[$itemIndex];
  }

  // Check if Item Exists, Returns Index
  protected function itemIndex($id) {
    return array_search($id, array_column($this->items, 'id'));
  }
  
  // Find Item by Key/Value 
  // (eg. findItem('name', 'red socks'))
  public function searchItems($key, $value) {
    return $this->items[array_search($value, array_column($this->items, $key))];
  }

  // Check if Cart has Item
  public function hasItem($id) {
    if ($this->itemIndex($id) !== false) {
      return true;
    }
    return false;
  }

  // Add Item to Cart
  public function add($item, $quantity = 1) {
    if ($this->hasItem($item['id'])) {
      $this->items[$this->itemIndex($item['id'])]['quantity'] += $quantity;
    } else {
      $item['quantity'] = $quantity;
      $this->items[] = $item;
    }
  }

  // Remove Item from Cart
  public function remove($item, $quantity = 1) {
    $id = $item['id'];
    if ($this->hasItem($id)) {
      // Get the Current Amount (by Refence)
      $current_amount = &$this->items[$this->itemIndex($id)]['quantity'];
    
      if ($current_amount <= $quantity) {
        unset($this->items[$this->itemIndex($item['id'])]);
      } else {
        $current_amount -= $quantity;
      }
    }
  }

  // Calculate Total Price
  public function total() {
    return $this->calcTotalProp('price');
  }

  // Calculate Quantity of Items in Cart
  public function itemCount() {
    return $this->calcTotalProp('quantity');
  }

  // Calculate Total of specified Property (eg. Price | Item Count)
  protected function calcTotalProp($prop) {
    $total = 0;
    foreach($this->items as $item) {
      $total += $item[$prop];
    }
    return $total;
  }

  /** 
   * Persist the Cart Items Array to the Session
   * Note: Yay for Side-Effects!
  */
  public function save() {
    return $_SESSION['cart'] = $this->items();
  }
}