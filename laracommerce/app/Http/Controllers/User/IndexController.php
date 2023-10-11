<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
            $sliders = Slider::where('status', '0')->where('type','0')->get();
            $deals = Slider::where('status', '0')->where('type','1')->get();
            $categories = Category::where('status', '0')->get();
            $brands = Brands::where('status', '0')->get();
            # arrivalDate = products added in last 2 months
            return view('user.pages.home.index',compact(['sliders','categories','brands','deals']));
    }

    public function categoryProduct($category_slug)
    {
        $category=Category::where('slug',$category_slug)->first();
        if($category)
        {
            return view('user.pages.shop.categoryProduct',compact('category'));
        }else{
            return redirect()->back();
        }
    }

    public function shop()
    {
        return view('user.pages.shop.shop');
    }


    public function productDetails($id)
    {
        $product=Product::where('id',$id)->where('status','0')->first();
        if($product)
        {
            return view('user.pages.product.productDetail',compact('product'));
        }else{
            return redirect()->back();
        }
    }



    public function searchProduct(Request $request)
    {
        if($request->search)
        {
            $search = Product::where('name','like','%'.$request->search.'%')->latest()->paginate(15);
            return view('user.pages.search',compact('search'));
        }
    }


}
