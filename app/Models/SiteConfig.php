<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    protected $fillable = [
        'telefone',
        'email',
        'whatsapp',
        'endereco',
        'banners'
    ];

    protected $casts = ['banners' => 'array'];
}
