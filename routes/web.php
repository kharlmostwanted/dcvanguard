<?php

use App\Http\Livewire\Clients\Index;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Billings\Create as BillingsCreate;
use App\Http\Livewire\Billings\Index as BillingsIndex;
use App\Http\Livewire\Billings\Show;
use App\Http\Livewire\Clients\Create;
use App\Http\Livewire\Clients\Edit;
use App\Http\Livewire\Clients\Show as ClientsShow;
use App\Http\Livewire\Clients\ShowPrint;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Payments\Create as PaymentsCreate;

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

Auth::routes(['register' => false]);

Route::get('/home', Dashboard::class)->name('home');

Route::prefix('admin')
    ->name('admin.')
    // ->middleware('auth')
    ->group(function () {
        Route::prefix('clients')->name('clients.')->group(function () {
            Route::get('/', Index::class)->name('index');
        });
    });

Route::prefix('clients')->name('clients.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{client}/edit', Edit::class)->name('edit');
        Route::get('/{client}', ClientsShow::class)->name('show');
        Route::get('/{client}/show-print', ShowPrint::class)->name('show-print');
    });

Route::prefix('billings')->name('billings.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/create/{client}', BillingsCreate::class)->name('create');
        Route::get('/{billing}', Show::class)->name('show');
        Route::get('/', BillingsIndex::class)->name('index');
    });

Route::prefix('payments')->name('payments.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/create/{billing}', PaymentsCreate::class)->name('create');
    });
