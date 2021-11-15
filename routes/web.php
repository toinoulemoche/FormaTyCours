<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteryMailController;
use App\Http\Controllers\Formations;
use App\Http\Controllers\AdminsL;

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

Route::get('/', [Formations::class, 'index']);
Route::get('/formation/{id}', [Formations::class, 'detail'])->name('Details');

Route::get('/sendRegistry', function () {
    return view('sendRegistery');
})->name('registry');

Route::post('/sentRegistery', [RegisteryMailController::class, 'sent'])->name('sentRegistery');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/upload', function () {
    return view('upload');
})->middleware(['auth'])->name('upload');

Route::resource('administrations', AdminsL::class)->middleware(['auth']);
Route::get('/user/{id}', [\App\Http\Controllers\updateProfile::class, 'edit'])->middleware(['auth'])->name('changecred');
Route::resource('confirm', \App\Http\Controllers\updateProfile::class)->middleware(['auth']);

require __DIR__.'/auth.php';
