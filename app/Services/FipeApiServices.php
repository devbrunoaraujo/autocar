<?php

namespace App\Services;

use App\Contracts\FipeApiInterface;
use Illuminate\Support\Facades\Http;

class FipeApiServices implements FipeApiInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.fipe.base_url');
    }

    public function listarMarcas(): array
    {
        $response = Http::get("https://parallelum.com.br/fipe/api/v1/carros/marcas");
        return collect($response->json())->pluck('nome', 'codigo')->toArray();
    }

    public function listarModelos(string $marca): array
    {
        $response = Http::get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marca}/modelos");
        return collect($response->json()['modelos'])->pluck('nome', 'codigo')->toArray();
    }

    public function listarAnos(string $marca, string $modelo): array
    {
        $response = Http::get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marca}/modelos/{$modelo}/anos");
        return collect($response->json())->pluck('nome', 'codigo')->toArray();
    }

    public function consultarPreco(string $marca, string $modelo, string $ano): array
    {
        $response = Http::get("{$this->baseUrl}/carros/marcas/{$marca}/modelos/{$modelo}/anos/{$ano}");
        return $response->json();
    }
}
