<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            'Ar-condicionado',
            'Direção hidráulica',
            'Direção elétrica',
            'Vidros elétricos',
            'Travas elétricas',
            'Airbag motorista',
            'Airbag passageiro',
            'Freios ABS',
            'Teto solar',
            'Rodas de liga leve',
            'Câmbio automático',
            'Bancos de couro',
            'Sensor de estacionamento',
            'Câmera de ré',
            'Piloto automático',
            'Chave canivete',
            'Multimídia com tela',
            'Sistema de navegação (GPS)',
            'Computador de bordo',
            'Retrovisores elétricos',
            'Alarme',
            'Farol de neblina',
            'Controle de tração',
            'Controle de estabilidade',
            'Encosto de cabeça traseiro',
            'Desembaçador traseiro',
            'Isofix',
            'Start/Stop',
            'Entrada USB',
            'Bluetooth',
            'Carregador por indução',
            'Assistente de partida em rampa',
            'Limitador de velocidade',
            'Banco com ajuste de altura',
            'Rebatimento elétrico dos retrovisores',
            'Faróis automáticos',
            'Sensor de chuva',
            'Sistema de som premium',
            'Lanternas em LED',
        ];

        foreach ($options as $name) {
            DB::table('options')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
