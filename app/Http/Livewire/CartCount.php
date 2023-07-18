<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCount extends Component
{
    public $cartTotal;
    protected $listeners = [
        'cartNo'
    ];

    public $test =null;
    public function cartNo($cartItems){
        $this->cartTotal = $cartItems + $this->cartTotal;
        $this->test = "vendor added";
        $this->render();
    }

    public function render()
    {
        return view('livewire.cart-count');
    }
}
