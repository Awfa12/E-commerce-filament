<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', HomePage::class)->name('home');


require __DIR__.'/auth.php';
