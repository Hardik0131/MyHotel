<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.rooms');
        }
        return view('visitor.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.rooms');
        }

        return back()->with('error', 'Invalid email or password. Please try again.')->withInput($request->only('email'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('hotel.home');
    }
}
