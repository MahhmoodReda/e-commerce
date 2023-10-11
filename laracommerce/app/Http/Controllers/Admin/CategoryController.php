<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Category\CategoryFormRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        #data sent to the blade by livewire component category
        return view('admin.pages.Category.index');
    }


    public function create()
    {
        return view('admin.pages.Category.create');
    }


    public function store(CategoryFormRequest $request)
    {
        # Data validated in app/Http/Requests/CategoryFormRequest
        $data = $request->validated();
        $data['slug']=Str::slug($data['slug']);
        # store image in storage
        if($request->hasFile('image'))
        {
            $data['image'] = Storage::putFile('Category',$data['image']);
        }
        Category::create($data);
            return to_route('category.index')->with('success','New Category created successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.pages.Category.edit',compact('category'));
    }


    public function update(CategoryFormRequest $request,Category $category)
    {
        $data = $request->validated();
        $data['slug']=Str::slug($data['slug']);

        # photo update if exist
        if($request->hasFile('image'))
        {
            Storage::delete($category->image);
            $data['image'] = Storage::putFile('Category',$data['image']);
        }
        $category->update($data);
        return to_route('category.index')->with('success','Category updated successfully');

    }


}
