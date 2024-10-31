<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setScriptRoute(function ($handle) {
  return Route::get('/rafnet/public/vendor/livewire/livewire/dist/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
  return Route::post('/rafnet/public/livewire/update', $handle);
});
Route::get('/', function () {
    return view('welcome');
});
