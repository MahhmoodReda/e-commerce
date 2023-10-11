<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function index()
    {
        return view('admin.pages.Brands.index');
    }
}
