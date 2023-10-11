<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ImageProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function destroy(int $id)
    {
        $image = ProductImage::findOrFail($id);
        if(File::exists("storage/$image->image"))
        {
            File::delete("storage/$image->image");
        }
        $image->delete();
        return to_route('products.index')->with('success','image deleted');
    }
}
