<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Slider\SliderFormRequest;

class SliderController extends Controller
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
        $sliders = Slider::all();
        return view('admin.pages.Slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image'))
        {
            $validatedData['image'] = Storage::putFile('Slider',$validatedData['image']);
        }
        Slider::create($validatedData);
        return to_route('slider.index')->with('success','slider added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.Slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();
        if($request->hasFile('image'))
        {
            Storage::delete($slider->image);
            $validatedData['image'] = Storage::putFile('Slider',$validatedData['image']);
        }
        $slider->update($validatedData);
        return to_route('slider.index')->with('success','slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if(File::exists("storage/$slider->image"))
        {
            File::delete("storage/$slider->image");
        }
        $slider->delete();
        return to_route('slider.index')->with('success','slider deleted successfully');
    }
}
