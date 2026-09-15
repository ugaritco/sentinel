<?php

use Heritage\Http\Request;
use Heritage\Support\Facades\Route;

Route::middleware('sentinel')->get('/debug', fn (Request $request) => phpinfo());

Route::get('/', function () {
    return view('welcome');
});
