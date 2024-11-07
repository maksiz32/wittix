<?php

use Illuminate\Support\Facades\Route;

// To Vue
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
