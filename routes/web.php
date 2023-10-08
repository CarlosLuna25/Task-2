<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/register', function () {
    abort(404); // Retorna un error 404 para esta ruta
})->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/products', function () {
        return view('products');
    })->name('products');
    Route::get('/inventory', function () {
        return view('inventory.inventory');
    })->name('inventory');
    Route::get('/prices', function () {
        return view('price.price');
    })->name('prices');
    Route::get('/changes', function () {
        return view('teamleader.changes');
    })->name('changes')->middleware('Teamleader');
 


});

