<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCount extends Component
{
    public $cartTotal;
    protected $listeners = [
        'cartNo'
    ];
    public function cartNo($cartItems){
        $this->cartTotal = $cartItems + $this->cartTotal;
        $this->render();
    }

    public function render()
    {
        return view('livewire.cart-count');
    }
}
