<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [welcomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin')->name('admin');
require __DIR__.'/auth.php';
Route::resource('posts', PostController::class)->except([
    'index'
]);

