<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    protected $fillable = [
        'logo',
        'telefone',
        'email',
        'whatsapp',
        'facebook',
        'instagram',
        'endereco',
        'banners'
    ];

    protected $casts = ['banners' => 'array'];
}
