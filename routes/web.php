<?php

use App\Livewire\AboutUs;
use App\Livewire\FinancingProposal;
use App\Livewire\VehicleShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Stock;
use App\Livewire\Success;

Route::get('/', Home::class)->name('home');
Route::get('/estoque', Stock::class)->name('estoque');
Route::get('/veiculo/{id}', VehicleShow::class)->name('veiculo');
Route::get('/sobre-nos', AboutUs::class)->name('sobre');

// Página principal do financiamento
Route::get('/financiamento/{car_id?}', FinancingProposal::class)
    ->name('financing.index');

// Página de sucesso
Route::get('/financiamento/sucesso', Success::class)->name('sucesso');

// Política de Privacidade e Termos (LGPD)
Route::get('/politica-privacidade', function () {
    return view('legal.privacy-policy');
})->name('privacy.policy');

Route::get('/termos-uso', function () {
    return view('legal.terms-of-service');
});
