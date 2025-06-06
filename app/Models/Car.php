<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'preco'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Options::class);
    }
}
