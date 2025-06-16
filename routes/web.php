<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




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
    return view('welcome');
});
Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('user.index');

Route::middleware('auth')->group(function () {
  Route::get('/users-record', [UserController::class, 'create'])->name('user.create');

Route::post('/users-record', [UserController::class, 'store'])->name('user.store');
 
Route::get('/clients/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/clients/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/clients/{id}', [UserController::class, 'destroy'])->name('user.destroy'); 
Route::get('/invoice/{id}/download', [InvoiceController::class, 'generate']);



});

require __DIR__.'/auth.php';
