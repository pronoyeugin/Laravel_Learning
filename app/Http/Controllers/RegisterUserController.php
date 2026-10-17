<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
   public function create()
   {
      return view('auth.register');
   }

   public function store()
   {

    dd(request()->all());
    
    //   $request->validate([
    //      'first_name' => 'required|string|max:255',
    //      'last_name' => 'required|string|max:255',
    //      'email' => 'required|string|email|max:255|unique:users',
    //      'password' => 'required|string|min:8|confirmed',
    //   ]);

    //   // Create the user
    //   $user = \App\Models\User::create([
    //      'first_name' => $request->first_name,
    //      'last_name' => $request->last_name,
    //      'email' => $request->email,
    //      'password' => bcrypt($request->password),
    //   ]);

    //   // Log the user in
    //   auth()->login($user);

    //   return redirect()->route('home')->with('success', 'Registration successful!');
   }


}
