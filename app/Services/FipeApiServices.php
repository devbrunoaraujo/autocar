<?php

namespace App\Services;

use App\Contracts\FipeApiInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class FipeApiServices implements FipeApiInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.fipe.base_url');
    }

    public function listarMarcas(): array
    {
        try {
            $response = Http::timeout(5)->get("https://parallelum.com.br/fipe/api/v1/carros/marcas");

            if ($response->successful()) {
                return collect($response->json())->pluck('nome', 'codigo')->toArray();
            }

            Log::warning("Erro ao listar marcas da FIPE: " . $response->status());
        } catch (Exception $e) {
            Log::error("Exception em listarMarcas(): " . $e->getMessage());
        }

        return []; // fallback seguro
    }

    public function listarModelos(string $marca): array
    {
        try {
            $response = Http::timeout(5)->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marca}/modelos");

            if ($response->successful()) {
                return collect($response->json()['modelos'])->pluck('nome', 'codigo')->toArray();
            }

            Log::warning("Erro ao listar modelos da FIPE para marca {$marca}: " . $response->status());
        } catch (Exception $e) {
            Log::error("Exception em listarModelos({$marca}): " . $e->getMessage());
        }

        return [];
    }

    public function listarAnos(string $marca, string $modelo): array
    {
        try {
            $response = Http::timeout(5)->get("https://parallelum.com.br/fipe/api/v1/carros/marcas/{$marca}/modelos/{$modelo}/anos");

            if ($response->successful()) {
                return collect($response->json())->pluck('nome', 'codigo')->toArray();
            }

            Log::warning("Erro ao listar anos da FIPE para modelo {$modelo}: " . $response->status());
        } catch (Exception $e) {
            Log::error("Exception em listarAnos({$marca}, {$modelo}): " . $e->getMessage());
        }

        return [];
    }

    public function consultarPreco(string $marca, string $modelo, string $ano): array
    {
        try {
            $response = Http::timeout(3)->get("{$this->baseUrl}/carros/marcas/{$marca}/modelos/{$modelo}/anos/{$ano}");

            if ($response->successful()) {
                return $response->json();
            }

            Log::warning("Erro ao consultar preço na FIPE para {$marca}/{$modelo}/{$ano}: " . $response->status());
        } catch (Exception $e) {
            Log::error("Exception em consultarPreco({$marca}, {$modelo}, {$ano}): " . $e->getMessage());
        }

        return ['erro' => 'Não foi possível consultar o preço no momento.'];
    }
}
