<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::resource('properties', 'PropertyController');
