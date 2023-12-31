<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// # Guest route
Route::get( '/',    [GuestHomeController::class,    'homepage'  ])->name('homepage');

// # Protected routes
Route::middleware('auth')
    ->prefix('admin')   // * routes url start with "/admin." 
    ->name('admin.')    // * routes name start with "admin." 
    ->group(
        function () {
            Route::get( '/dashboard',   [AdminHomeController::class,    'dashboard' ])->name('dashboard');
            Route::get( '/', [DashboardController::class, 'home']);
            Route::resource('/restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug']);
            Route::resource('/dishes' , DishController::class)->parameters(['dishes' => 'dish:slug']);
           
        }
    );

// ! Generated routes, do not touch
// # Protected profile's routes
Route::middleware('auth')
    ->prefix('profile')      // * routes url start with "/profile." 
    ->name('profile.')       // * routes name start with "profile." 
    ->group(
        function () {
            Route::get(     '/', [ProfileController::class, 'edit'      ])->name('edit');
            Route::patch(   '/', [ProfileController::class, 'update'    ])->name('update');
            Route::delete(  '/', [ProfileController::class, 'destroy'   ])->name('destroy');
        }
    );

require __DIR__ . '/auth.php';