<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'thumb',
        'is_active',
        'is_featured',
        'quilometragem',
        'cambio',
        'combustivel',
        'comentario'
    ];

     protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected static function booted()
    {

        static::saving(function ($car) {
            if (! $car->is_active) {
                $car->is_featured = false;
            }
        });

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

    public function financingProposals(): HasMany
    {
        return $this->hasMany(FinancingProposalModel::class);
    }
}
