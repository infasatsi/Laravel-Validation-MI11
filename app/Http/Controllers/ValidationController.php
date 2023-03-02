<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ValidationController extends Controller
{

    public function index()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // TODO: Save data to database
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect('/validation-demo')->with('success', 'Data saved successfully!!');
    }
}
