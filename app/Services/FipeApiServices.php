<?php

namespace App\Services;

use App\Contracts\FipeApiInterface;
use Illuminate\Support\Facades\Http;

class FipeCarroApiService implements FipeApiInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.fipe.base_url');
    }

    public function listarMarcas(): array
    {
        $response = Http::get("{$this->baseUrl}/carros/marcas");
        return $response->json();
    }

    public function listarModelos(string $marca): array
    {
        $response = Http::get("{$this->baseUrl}/carros/marcas/{$marca}/modelos");
        return $response->json();
    }

    public function listarAnos(string $marca, string $modelo): array
    {
        $response = Http::get("{$this->baseUrl}/carros/marcas/{$marca}/modelos/{$modelo}/anos");
        return $response->json();
    }

    public function consultarPreco(string $marca, string $modelo, string $ano): array
    {
        $response = Http::get("{$this->baseUrl}/carros/marcas/{$marca}/modelos/{$modelo}/anos/{$ano}");
        return $response->json();
    }
}
