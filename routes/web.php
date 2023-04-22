<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\ProjectController::class, 'list'])->middleware('auth')->name('home');
Route::get('/home', [App\Http\Controllers\ProjectController::class, 'list'])->middleware('auth')->name('home');

Route::middleware(['auth'])->prefix('project')->group(function(){
    Route::get('/', [App\Http\Controllers\ProjectController::class, 'list'])->name('project.list');
    Route::get('/new', [App\Http\Controllers\ProjectController::class, 'insert'])->name('project.insert');
    Route::post('/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::post('/{project}', [App\Http\Controllers\ProjectController::class, 'assignToMe'])->name('project.assignToMe');
    Route::get('/{project}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/{project}/finish', [App\Http\Controllers\ProjectController::class, 'finish'])->name('project.finish');
    Route::get('/{project}/finishForm', [App\Http\Controllers\ProjectController::class, 'finishForm'])->name('project.finishForm');
    Route::put('/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::put('/{project}/finalize', [App\Http\Controllers\ProjectController::class, 'finalize'])->name('project.finalize');
});

Route::middleware(['auth'])->prefix('user')->group(function(){
    Route::get('/new', [App\Http\Controllers\UserController::class, 'insert'])->name('user.insert');
    Route::get('/', [App\Http\Controllers\UserController::class, 'list'])->name('user.list');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});