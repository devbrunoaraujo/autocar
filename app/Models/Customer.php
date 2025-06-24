<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'full_name',
        'cpf',
        'email',
        'phone',
        'birth_date',
        'monthly_income',
        'profession',
        'address'
    ];

    protected $casts = [
        'monthly_income' => 'decimal:2',
        'birth_date' => 'date'

    ];

    public function financingProposals(): HasMany
    {
        return $this->hasMany(FinancingProposalModel::class);
    }
}
