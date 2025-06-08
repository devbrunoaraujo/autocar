<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'preco',
        'marca_nome',
        'modelo_nome',
        'ano_nome',
        'images',
        'thumb'
    ];

     protected $casts = [
        'images' => 'array',
    ];

    protected static function booted()
    {
        static::deleting(function ($car) {
            if ($car->thumb) {
                Storage::disk('public')->delete($car->thumb);
            }
            if (is_array($car->images)) {
                foreach ($car->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
        });
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Options::class);
    }
}
