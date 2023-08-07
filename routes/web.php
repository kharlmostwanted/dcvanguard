<?php

use App\Http\Livewire\Clients\Index;
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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    // ->middleware('auth')
    ->group(function () {
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Index::class)->name('create');
    });
});
