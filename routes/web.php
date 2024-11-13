<?php

use App\Http\Controllers\CoordinadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'coordinador'], function(){
    Route::get('/index', [CoordinadorController::class, 'index'])->name('lista.coordi')->middleware('auth');
    Route::get('/{id}/show', [CoordinadorController::class, 'show'])->name('ver.coordi')->middleware('auth');
    Route::get('/create', [CoordinadorController::class, 'create'])->name('add.coordi')->middleware('auth');
    Route::post('/store', [CoordinadorController::class, 'store'])->name('store.coordi')->middleware('auth');
    Route::get('/{id}/edit', [CoordinadorController::class, 'edit'])->name('edit.coordi')->middleware('auth');
    Route::post('/update/{id}', [CoordinadorController::class, 'update'])->name('update.coordi')->middleware('auth');
    Route::get('destroy/{admin}', [CoordinadorController::class, 'destroy'])->name("destroy.coordi")->middleware('auth');

});
