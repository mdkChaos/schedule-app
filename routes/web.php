<?php

use App\Http\Controllers\BrigadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeController;

Route::view('/', 'index')->name('index');

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

Route::post('language-switch', [LocaleController::class, 'switchLanguage'])->name('language.switch');


// Factories (CRUD + trashed)
Route::controller(FactoryController::class)
    ->prefix('factories')
    ->name('factories.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('factories', FactoryController::class);

// Workshops (CRUD + trashed)
Route::controller(WorkshopController::class)
    ->prefix('workshops')
    ->name('workshops.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('workshops', WorkshopController::class);

// Department (CRUD + trashed))
Route::controller(DepartmentController::class)
    ->prefix('departments')
    ->name('departments.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('departments', DepartmentController::class);

// Cell (CRUD + trashed)
Route::controller(CellController::class)
    ->prefix('cells')
    ->name('cells.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('cells', CellController::class);

// Brigade (CRUD + trashed)
Route::controller(BrigadeController::class)
    ->prefix('brigades')
    ->name('brigades.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('brigades', BrigadeController::class);

// Position (CRUD + trashed)
Route::controller(PositionController::class)
    ->prefix('positions')
    ->name('positions.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('positions', PositionController::class);

// Shift (CRUD + trashed)
Route::controller(ShiftController::class)
    ->prefix('shifts')
    ->name('shifts.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('shifts', ShiftController::class);

// Role (CRUD + trashed)
Route::controller(RoleController::class)
    ->prefix('roles')
    ->name('roles.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('roles', RoleController::class);

// Employee (CRUD + trashed)
Route::controller(EmployeeController::class)
    ->prefix('employees')
    ->name('employees.')
    ->group(function () {
        Route::get('trashed', 'trashed')->name('trashed');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });
Route::resource('employees', EmployeeController::class);
