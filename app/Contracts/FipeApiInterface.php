<?php

namespace App\Contracts;

interface FipeApiInterface
{
    public function listarMarcas(): array;

    public function listarModelos(string $marca): array;

    public function listarAnos(string $marca, string $modelo): array;

    public function consultarPreco(string $marca, string $modelo, string $ano): array;
}
