<?php

namespace App\Livewire\User\Shop;

use App\Models\Brands;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class Shop extends Component
{
    public  $brandInputs=[] ,$categoryInputs=[] , $priceInput ;





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


    public function render()
    {
        $products = Product::where('status','0')->where('quantity','>','0')
        ->when($this->brandInputs,function($query){
            $query->whereIn('brand_id',$this->brandInputs);
        })
        ->when($this->categoryInputs,function($q){
            $q->whereIn('category_id',$this->categoryInputs);
        })
        ->when($this->priceInput,function($q){
            $q->when($this->priceInput == 'high-to-low',function($q2){
                $q2->orderBy('selling_price','DESC');
            })
            ->when($this->priceInput == 'low-to-high',function($q2){
                $q2->orderBy('selling_price','ASC');
            });
        })
        ->get();
        $brands = Brands::where('status','0')->get();
        $categories = Category::where('status','0')->get();


        return view('livewire.user.shop.shop',compact('products','brands','categories'));
    }
}
