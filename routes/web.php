<?php

use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EnderecoController::class, 'index'])->name('endereco.index');
Route::get('enderecos',[EnderecoController::class, 'index'])->name('endereco.index');
Route::get('enderecos/create',[EnderecoController::class, 'create'])->name('endereco.create');
Route::post('enderecos',[EnderecoController::class, 'store'])->name('endereco.store');
Route::post('buscar',[EnderecoController::class, 'show'])->name('endereco.buscar');
Route::get('enderecos/{id}/editar',[EnderecoController::class, 'edit'])->name('endereco.editar');
Route::put('enderecos/editar/{id}',[EnderecoController::class, 'update']);
Route::get('enderecos/{id}',[EnderecoController::class, 'destroy']);


