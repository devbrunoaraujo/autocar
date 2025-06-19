<?php

use App\Livewire\AboutUs;
use App\Livewire\VehicleShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Stock;


Route::get('/', Home::class)->name('home');
Route::get('/stock', Stock::class)->name('estoque');
Route::get('/vehicle/{id}', VehicleShow::class)->name('veiculo');
Route::get('/about-us', AboutUs::class)->name('sobre');

