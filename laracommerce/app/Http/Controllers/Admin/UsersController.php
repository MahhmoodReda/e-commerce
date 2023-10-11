<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UsersFormRequest;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $users = User::all();
        return view('admin.pages.Users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.pages.Users.create');
    }


    public function store(UsersFormRequest $request)
    {
        $validatedData = $request->validated();
        User::create($validatedData);
        return to_route('admin.all-users')->with('success','user created successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.Users.edit',compact('user'));
    }


    public function update (UsersFormRequest $request , $id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);
        $user->update($validatedData);
        return to_route('admin.all-users')->with('success','user updated successfully');

    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
         return to_route('admin.all-users')->with('success','user deleted successfully');
    }
}
