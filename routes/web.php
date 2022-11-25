<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ForYou;
use App\Http\Livewire\Laporan;
use App\Http\Livewire\Pengunjung;
use App\Http\Livewire\Tiket;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('foryou', ForYou::class)->name('foryou');

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        }
    } else {
        return redirect()->route('foryou');
    }
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('dashboard', Dashboard::class)->middleware('role:admin')->name('dashboard');
    Route::get('tiket', Tiket::class)->middleware('role:admin')->name('tiket');
});
