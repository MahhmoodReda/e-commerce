<?php

namespace App\Livewire\User\Cart;

use Livewire\Component;
use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $totalPrice = 0;

    public function deleteFromCart($id)
    {

            ModelsCart::where('id',$id)->where('user_id',Auth::user()->id)->delete();
            $this->dispatch('cart-updated'); // make event that wish list is updated


    }


    public function increment($cartId)
    {
        $cartData = ModelsCart::where('id',$cartId)->where('user_id',Auth::user()->id)->first();
        if($cartData->product->quantity > $cartData->quantity)
        {
            $cartData->increment('quantity');
        }
    }


    public function decrement($cartId)
    {
        $cartData = ModelsCart::where('id',$cartId)->where('user_id',Auth::user()->id)->first();
        if($cartData->quantity > 1)
        {
            $cartData->decrement('quantity');
        }
    }



    public function render()
    {

        $cartProducts = ModelsCart::where('user_id',Auth::user()->id)->get();
        return view('livewire.user.cart.cart',compact('cartProducts'));
    }



}
