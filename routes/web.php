<?php

use Illuminate\Support\Facades\Route;

// web.php
Route::get('/', fn () => view('home'))->name('home');
Route::get('/stock', fn () => view('stock'))->name('estoque');

