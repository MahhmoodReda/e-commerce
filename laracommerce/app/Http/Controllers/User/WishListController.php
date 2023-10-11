<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function wishlist()
    {
        return view('user.pages.wishlist.wishlist');
    }
}
