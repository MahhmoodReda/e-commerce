<?php

namespace App\Livewire\User\Wishlist;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList as ModelsWishList;

class Wishlist extends Component
{

    public function deleteFromWishList($id)
    {
        if(Auth::check())
        {
            ModelsWishList::where('id',$id)->delete();
            $this->dispatch('wishList-updated'); // make event that wish list is updated
        }else{
            return to_route('user.home');
        }

    }



    public function addToCart($proId)
    {
        if(Auth::check())
        {
            if(Cart::where('product_id',$proId)->where('user_id',auth()->user()->id)->exists())
            {
                session()->flash('message', 'product successfully added.');
            }else{
                Cart::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$proId,
                    'quantity' =>'1'
                ]);
                $this->dispatch('cart-updated'); // make event that cart  is updated
            }
        }else{
            return redirect()->route('login');
        }
    }




    public function render()
    {
        $wishlists = ModelsWishList::where('user_id',Auth::user()->id)->get();
        return view('livewire.user.wishlist.wishlist',compact('wishlists'));
    }
}
