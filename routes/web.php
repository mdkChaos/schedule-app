<?php

use App\Http\Controllers\BrigadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PositionController;

// Головна сторінка
Route::view('/', 'index')->name('index');

// Адмін-панель
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

// Change language
Route::get('lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');
Route::post('language-switch', [LocaleController::class, 'switchLanguage'])->name('language.switch');


// Factories (CRUD + корзина)
Route::controller(FactoryController::class)
    ->prefix('factories')
    ->name('factories.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('factories', FactoryController::class);

// Workshops (CRUD + корзина)
Route::controller(WorkshopController::class)
    ->prefix('workshops')
    ->name('workshops.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
        Route::get('/factories/{factory}/workshops', 'byFactory');
    });
Route::resource('workshops', WorkshopController::class);

// Department (CRUD + корзина)
Route::controller(DepartmentController::class)
    ->prefix('departments')
    ->name('departments.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('departments', DepartmentController::class);

// Cell (CRUD + корзина)
Route::controller(CellController::class)
    ->prefix('cells')
    ->name('cells.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('cells', CellController::class);

// Brigade (CRUD + корзина)
Route::controller(BrigadeController::class)
    ->prefix('brigades')
    ->name('brigades.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('brigades', BrigadeController::class);

// Position (CRUD + корзина)
Route::controller(PositionController::class)
    ->prefix('positions')
    ->name('positions.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('positions', PositionController::class);
