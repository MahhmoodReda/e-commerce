<?php

namespace App\Livewire\User\Product;


use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Arrivals extends Component
{
    use WithPagination ;

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
        $arrivalDate = Carbon::now()->subMonths(2);
        $products = Product::where('status', '0')->where('created_at','>=',"$arrivalDate")
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
        ->paginate(8);
        $categories = Category::where('status', '0')->get();
        $brands = Brands::where('status', '0')->get();
        return view('livewire.user.product.arrivals',compact('products','brands','categories'));
    }


}
