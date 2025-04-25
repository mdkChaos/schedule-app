<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactoryController;

Route::view('/', 'index')->name('index');

Route::resource('factories', FactoryController::class);

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
