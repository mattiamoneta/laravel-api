<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

#Custom controllers
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\TechnologyController;

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
    return view('public');
});

Route::middleware(['auth','verified'])
->name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
});

Route::middleware('auth')
->name('profile.')
->prefix('profile')
->group(function(){

    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');

});

require __DIR__.'/auth.php';
