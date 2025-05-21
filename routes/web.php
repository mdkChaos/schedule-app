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
use App\Http\Controllers\UserController;

require __DIR__ . '/auth.php';

Route::view('/', 'index')->name('index');

Route::post('language-switch', [LocaleController::class, 'switchLanguage'])->name('language.switch');

Route::middleware('auth')->group(function () {
    Route::middleware(['role:Admin'])->group(function () {
        // Factories (CRUD + trashed)
        Route::controller(FactoryController::class)
            ->prefix('factories')
            ->name('factories.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{factory}/restore', 'restore')->name('restore');
                Route::delete('{factory}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('factories', FactoryController::class);

        // Workshops (CRUD + trashed)
        Route::controller(WorkshopController::class)
            ->prefix('workshops')
            ->name('workshops.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{workshop}/restore', 'restore')->name('restore');
                Route::delete('{workshop}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('workshops', WorkshopController::class);

        // Department (CRUD + trashed))
        Route::controller(DepartmentController::class)
            ->prefix('departments')
            ->name('departments.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{department}/restore', 'restore')->name('restore');
                Route::delete('{department}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('departments', DepartmentController::class);

        // Cell (CRUD + trashed)
        Route::controller(CellController::class)
            ->prefix('cells')
            ->name('cells.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{cell}/restore', 'restore')->name('restore');
                Route::delete('{cell}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('cells', CellController::class);

        // Brigade (CRUD + trashed)
        Route::controller(BrigadeController::class)
            ->prefix('brigades')
            ->name('brigades.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{brigade}/restore', 'restore')->name('restore');
                Route::delete('{brigade}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('brigades', BrigadeController::class);

        // Position (CRUD + trashed)
        Route::controller(PositionController::class)
            ->prefix('positions')
            ->name('positions.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{position}/restore', 'restore')->name('restore');
                Route::delete('{position}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('positions', PositionController::class);

        // Shift (CRUD + trashed)
        Route::controller(ShiftController::class)
            ->prefix('shifts')
            ->name('shifts.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{shift}/restore', 'restore')->name('restore');
                Route::delete('{shift}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('shifts', ShiftController::class);

        // Employee (CRUD + trashed)
        Route::controller(EmployeeController::class)
            ->prefix('employees')
            ->name('employees.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{employee}/restore', 'restore')->name('restore');
                Route::delete('{employee}/force-delete', 'forceDelete')->name('forceDelete');
            });
    });

    Route::middleware(['role:Manager'])->group(function () {
        Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

        // Employee (CRUD)
        Route::resource('employees', EmployeeController::class);
    });

    Route::middleware(['role:Super Admin'])->group(function () {
        // Role (CRUD + trashed)
        Route::controller(RoleController::class)
            ->prefix('roles')
            ->name('roles.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{role}/restore', 'restore')->name('restore');
                Route::delete('{role}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('roles', RoleController::class);

        // User (CRUD + trashed)
        Route::controller(UserController::class)
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('trashed', 'trashed')->name('trashed');
                Route::post('{user}/restore', 'restore')->name('restore');
                Route::delete('{user}/force-delete', 'forceDelete')->name('forceDelete');
            });
        Route::resource('users', UserController::class);
    });
});

Route::fallback(function () {
    return redirect()->route('login');
});
