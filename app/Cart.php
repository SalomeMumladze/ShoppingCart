<?php

namespace App;

class Cart {
    public $items;       // An array to store cart items.
    public $totalQty;    // Total quantity of items in the cart.
    public $totalPrice;  // Total price of all items in the cart.

    public function __construct($oldCart) {
        // Constructor to initialize the cart with the data from the old cart.
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($item, $product_id) {
        // Add an item to the cart.
        $storedItem = [
            'qty' => 0,
            'product_id' => $product_id,
            'product_name' => $item->product_name,
            'product_price' => $item->product_price,
            'product_image' => $item->product_image,
            'item' => $item
        ];

        // Check if the product is already in the cart.
        if (array_key_exists($product_id, $this->items)) {
            $storedItem = $this->items[$product_id];
        }

        $storedItem['qty']++;
        $this->totalQty++;
        $this->totalPrice += $item->product_price;
        $this->items[$product_id] = $storedItem;
    }

    public function updateQty($id, $qty) {
        // Update the quantity of a specific item in the cart.
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['product_price'] * $qty;
    }

    public function removeItem($id) {
        // Remove an item from the cart.
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}

?>