<?php

use App\Livewire\VehicleShow;
use Illuminate\Support\Facades\Route;

// web.php
use App\Livewire\Home;

Route::get('/', Home::class)->name('home');
Route::get('/stock', fn () => view('stock'))->name('estoque');
Route::get('/vehicle/{id}', VehicleShow::class)->name('veiculo');

