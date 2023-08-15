<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        return view('admins.index',compact('users')) ;
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
        ]);
        return redirect()->back()->with('success' , 'Added successfully');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        User::findOrFail($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);
        return redirect()->back()->with('success' , 'Updated successfully');
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        return redirect()->back()->with('success' , '  Deleted successfully');
    }

}
