<?php

namespace App\Livewire\User\Product;

use App\Models\Brands;
use App\Models\Product;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class ViewProductCategory extends Component
{

    public $products , $category , $brands , $brandInputs=[] , $priceInput ;
    public function mount($category)
    {
        $this->category = $category;
        
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





    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
        ->when($this->brandInputs,function($query){
            $query->whereIn('brand_id',$this->brandInputs);
        })
        ->when($this->priceInput,function($q){
            $q->when($this->priceInput == 'high-to-low',function($q2){
                $q2->orderBy('selling_price','DESC');
            })
            ->when($this->priceInput == 'low-to-high',function($q2){
                $q2->orderBy('selling_price','ASC');
            });
        })
        ->where('status','0')->get();

        $this->brands = Brands::where('status','0')->get();

            return view('livewire.user.product.view-product-category',[
                'products'=>$this->products,
                'category'=>$this->category,
                'brands'=>$this->brands,
            ]);
    }

}