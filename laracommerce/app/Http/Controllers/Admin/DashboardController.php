<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts =Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brands::count();

        $totalAllUsers = User::count();
        $totalUsers = User::where('type' , '0')->count();
        $totalAdmins = User::where('type' , '1')->count();

        $today = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrders = Order::count();
        $toDayOrders = Order::whereDate('created_at', $today)->count();
        $thisMonthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrders = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.pages.home',compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalUsers','totalAdmins','totalOrders','toDayOrders','thisMonthOrders','thisYearOrders'));
    }
}
