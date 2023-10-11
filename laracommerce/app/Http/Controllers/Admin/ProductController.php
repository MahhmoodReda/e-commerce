<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\ProductFormRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.pages.products.index',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brands::all();
        return view('admin.pages.products.create',compact('categories','brands'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug']=Str::slug($validatedData['slug']);
        $category = Category::findOrFail($validatedData['category_id']);
        $brand = Brands::findOrFail($validatedData['brand_id']);
        if($brand && $category)
        {
            $product=Product::create($validatedData);
        }

        # store multiple images
        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $image = Storage::putFile('Product',$image);
                ProductImage::create([
                    'image' => $image,
                    'product_id' => $product->id
                ]);
            }
        }
        return to_route('products.create')->with('success','Product created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brands::all();
        return view('admin.pages.products.edit',compact('categories','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $validatedData['slug']=Str::slug($validatedData['slug']);
        $category = Category::findOrFail($validatedData['category_id']);
        $brand = Brands::findOrFail($validatedData['brand_id']);
        if($brand && $category)
        {
            $product->update($validatedData);
            # store multiple images
            if($request->hasFile('image'))
            {
                foreach($request->file('image') as $image)
                {
                    $image = Storage::putFile('Product',$image);
                    ProductImage::create([
                        'image' => $image,
                        'product_id' => $product->id
                    ]);
                }
            }
        }else{
            return to_route('products.index')->with('error','no such product found');
        }
        return to_route('products.index')->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->ProductImage())
        {
            foreach($product->ProductImage() as $image)
            {
                if(File::exists("storage/$image->image"))
                {
                    File::delete("storage/$image->image");
                }
            }
        }
        $product->delete();
        return to_route('products.index')->with('success','product deleted successfully');
    }
}