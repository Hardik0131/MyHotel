<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('Visitor/login');
});

Route::get('register', function(){
    return view('Visitor/register');
});

Route::get('/', function(){
    return view('Visitor/home');
});