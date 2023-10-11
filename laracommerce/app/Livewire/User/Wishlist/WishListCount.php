<?php

namespace App\Livewire\User\Wishlist;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList as ModelsWishList;
use Livewire\Attributes\On;

class WishListCount extends Component
{

    #[On('wishList-updated')] // listen to event wishList-updated
    public function checkCount()
    {
        if(Auth::check())
        {
            return ModelsWishList::where('user_id', Auth()->user()->id)->count();
        }else{
            return  0 ;
        }
    }




    public function render()
    {
        $wishlists =ModelsWishList::where('user_id', Auth()->user()->id)->get();
        $countWishList = $this->checkCount();
        return view('livewire.user.wishlist.wish-list-count',compact('countWishList','wishlists'));
    }
}
