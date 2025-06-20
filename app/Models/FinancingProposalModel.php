<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FinancingProposalModel extends Model
{
    protected $table = 'financing_proposals';
    use HasFactory;

    protected $fillable = [
        'vehicle_brand',
        'vehicle_model',
        'vehicle_year',
        'vehicle_price',
        'full_name',
        'cpf',
        'email',
        'phone',
        'birth_date',
        'monthly_income',
        'profession',
        'down_payment',
        'installments',
        'marketing_consent',
        'status',
        'notes',
        'reviewed_at',
        'reviewed_by',
    ];

    protected $casts = [
        'vehicle_price' => 'decimal:2',
        'monthly_income' => 'decimal:2',
        'down_payment' => 'decimal:2',
        'birth_date' => 'date',
        'marketing_consent' => 'boolean',
        'reviewed_at' => 'datetime',
    ];

    // Accessors
    protected function vehicleInfo(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->vehicle_brand} {$this->vehicle_model} {$this->vehicle_year}"
        );
    }

    protected function formattedVehiclePrice(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->vehicle_price, 2, ',', '.')
        );
    }

    protected function formattedMonthlyIncome(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->monthly_income, 2, ',', '.')
        );
    }

    protected function formattedDownPayment(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->down_payment, 2, ',', '.')
        );
    }

    protected function maskedCpf(): Attribute
    {
        return Attribute::make(
            get: fn () => substr($this->cpf, 0, 3) . '.***.**' . substr($this->cpf, -2)
        );
    }

    protected function maskedPhone(): Attribute
    {
        return Attribute::make(
            get: fn () => '(' . substr($this->phone, 0, 2) . ') *****-' . substr($this->phone, -4)
        );
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeUnderReview($query)
    {
        return $query->where('status', 'under_review');
    }

    public function scopeRecentFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Methods
    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'approved' => 'bg-green-100 text-green-800',
            'rejected' => 'bg-red-100 text-red-800',
            'under_review' => 'bg-blue-100 text-blue-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusLabel(): string
    {
        return match($this->status) {
            'pending' => 'Pendente',
            'approved' => 'Aprovado',
            'rejected' => 'Rejeitado',
            'under_review' => 'Em Análise',
            default => 'Desconhecido',
        };
    }

    public function calculateFinancedAmount(): float
    {
        return $this->vehicle_price - $this->down_payment;
    }

    public function calculateInstallmentValue(): float
    {
        // Cálculo básico (implementar lógica de juros conforme necessário)
        $financedAmount = $this->calculateFinancedAmount();
        $interestRate = 0.015; // 1,5% ao mês (exemplo)

        // Price table formula
        $factor = pow(1 + $interestRate, $this->installments);
        $installmentValue = ($financedAmount * $interestRate * $factor) / ($factor - 1);

        return round($installmentValue, 2);
    }

    public function hasMarketingConsent(): bool
    {
        return $this->marketing_consent;
    }
}
