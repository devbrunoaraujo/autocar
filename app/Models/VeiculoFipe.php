<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VeiculoFipe extends Model
{
    protected $table = 'veiculo';
    protected $connection = 'fipe';

    public $timestamps = false;

    protected $fillable = [
        'fipe_cod', 'tabela_id', 'anoref', 'mesref', 'tipo',
        'marca_id', 'marca', 'modelo_id', 'modelo',
        'anomod', 'comb', 'valor'
    ];
}
