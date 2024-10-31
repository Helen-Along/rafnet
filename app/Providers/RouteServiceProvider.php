<?php

use Illuminate\Routing\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
        $url =  'rafnet/public/livewire/update';
        return Route::post($url, $handle);
    });