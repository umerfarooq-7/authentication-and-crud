<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware(['auth']);
Route::get('/adduser',[AdminController::class,'user'])->name('addUser')->middleware(['auth']);
Route::post('/updateuser',[AdminController::class,'updateUser'])->name('updateUser')->middleware(['auth']);
Route::get('/edituser/{id}',[AdminController::class,'editUser'])->name('editUser')->middleware(['auth']);
Route::post('/delete',[AdminController::class,'delete'])->name('delete');
require __DIR__.'/auth.php';
