<?php
class Inventory {
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
    return $this->items[array_search($id, array_column($this->items, 'id'))];
  }

  // Find Item by Key/Value 
  // (eg. findItem('name', 'red socks'))
  public function searchList($key, $value) {
    return $this->items[array_search($value, array_column($this->items, $key))];
  }
}