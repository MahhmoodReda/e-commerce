<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $totalPrice=0;

    #[On('cart-updated')] // listen to event cart-updated
    public function checkCount()
    {
        if(Auth::check())
        {
            return Cart::where('user_id', Auth()->user()->id)->count();
        }else{
            return  0 ;
        }
    }




    public function render()
    {
        
        $cartProducts =Cart::where('user_id', Auth()->user()->id)->get();
        $countCart = $this->checkCount();
        return view('livewire.user.cart.cart-count',compact('cartProducts','countCart'));
    }
}
