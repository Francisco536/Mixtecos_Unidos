<?php

use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\RepresentanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'coordinador'], function(){
    Route::get('/index', [CoordinadorController::class, 'index'])->name('lista.coordi')->middleware('auth');
    Route::get('/show/{id}', [CoordinadorController::class, 'show'])->name('ver.coordi')->middleware('auth');
    Route::get('/create', [CoordinadorController::class, 'create'])->name('add.coordi')->middleware('auth');
    Route::post('/store', [CoordinadorController::class, 'store'])->name('store.coordi')->middleware('auth');
    Route::get('/edit/{id}', [CoordinadorController::class, 'edit'])->name('edit.coordi')->middleware('auth');
    Route::post('/update/{id}', [CoordinadorController::class, 'update'])->name('update.coordi')->middleware('auth');
    Route::get('destroy/{admin}', [CoordinadorController::class, 'destroy'])->name("destroy.coordi")->middleware('auth');

});

Route::group(['prefix' => 'representante'], function(){
    Route::get('/index', [RepresentanteController::class, 'index'])->name('lista.repre')->middleware('auth');
    Route::get('/show/{id}', [RepresentanteController::class, 'show'])->name('ver.repre')->middleware('auth');
    Route::get('/create', [RepresentanteController::class, 'create'])->name('add.repre')->middleware('auth');
    Route::post('/store', [RepresentanteController::class, 'store'])->name('store.repre')->middleware('auth');
    Route::get('/edit/{id}', [RepresentanteController::class, 'edit'])->name('edit.repre')->middleware('auth');
    Route::post('/update/{id}', [RepresentanteController::class, 'update'])->name('update.repre')->middleware('auth');
    Route::get('destroy/{admin}', [RepresentanteController::class, 'destroy'])->name("destroy.repre")->middleware('auth');

});

Route::group(['prefix' => 'beneficiarios'], function(){
    Route::get('/index', [BeneficiariosController::class, 'index'])->name('lista.benef')->middleware('auth');
    Route::get('/show/{id}', [BeneficiariosController::class, 'show'])->name('ver.benef')->middleware('auth');
    Route::get('/create', [BeneficiariosController::class, 'create'])->name('add.benef')->middleware('auth');
    Route::post('/store', [BeneficiariosController::class, 'store'])->name('store.benef')->middleware('auth');
    Route::get('/edit/{id}', [BeneficiariosController::class, 'edit'])->name('edit.benef')->middleware('auth');
    Route::post('/update/{id}', [BeneficiariosController::class, 'update'])->name('update.benef')->middleware('auth');
    Route::get('destroy/{admin}', [BeneficiariosController::class, 'destroy'])->name("destroy.benef")->middleware('auth');

});
