<?php

namespace App;

class Cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldcart){
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }
    public function add($item, $id){
        $orderItem = ['qty'=>0,'price'=>$item->price,'item'=>$item];
        if($this->item){
            if(array_key_exists($id, $this->item)){
                $orderItem = $this->items[$id];
            }
        }
        $orderItem['qty']++;
        $orderItem['price'] = $item->price * $item->qty;
        $this->items[id] = $orderItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

    }
}
