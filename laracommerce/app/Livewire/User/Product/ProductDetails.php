<?php

namespace App\Livewire\User\Product;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class ProductDetails extends Component
{

    public $product , $quantityCount=1  ;

    public function increment()
    {
        if($this->quantityCount < $this->product->quantity)
        {
            $this->quantityCount++ ;
        }
    }


    public function decrement()
    {
        if($this->quantityCount > 1)
        {
            $this->quantityCount-- ;
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
                    'quantity' =>$this->quantityCount
                ]);
                $this->dispatch('cart-updated'); // make event that cart  is updated
            }
        }else{
            return redirect()->route('login');
        }
    }



    public function addToWish($productId)
    {
        if(Auth::check())
        {
            if(WishList::where('product_id',$productId)->where('user_id',auth()->user()->id)->exists())
            {
                session()->flash('message', 'product successfully added.');
            }else{
                WishList::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$productId,
                ]);
                $this->dispatch('wishList-updated'); // make event that wish list is updated
            }
        }else{
            return redirect()->route('login');
        }
    }



    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.user.product.product-details',[
            'product'=>$this->product,
        ]);
    }
}
