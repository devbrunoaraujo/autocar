<?php

namespace App\Livewire;

use App\Models\FinancingProposalModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FinancingProposal extends Component
{
    public $currentStep = 1;
    public $totalSteps = 4;

    // Dados do veículo
    #[Validate('required|string|max:255')]
    public $vehicle_brand = '';

    #[Validate('required|string|max:255')]
    public $vehicle_model = '';

    #[Validate('required|integer|min:1900|max:2025')]
    public $vehicle_year = '';

    #[Validate('required|numeric|min:1000')]
    public $vehicle_price = '';

    // Dados pessoais
    #[Validate('required|string|max:255')]
    public $full_name = '';

    #[Validate('required|string|size:11')]
    public $cpf = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|size:11')]
    public $phone = '';

    #[Validate('required|date|before:today')]
    public $birth_date = '';

    // Dados financeiros
    #[Validate('required|numeric|min:1000')]
    public $monthly_income = '';

    #[Validate('required|string|max:255')]
    public $profession = '';

    #[Validate('nullable|numeric|min:0')]
    public $down_payment = 0;

    #[Validate('required|integer|min:12|max:72')]
    public $installments = 24;

    // LGPD
    #[Validate('accepted')]
    public $accept_terms = false;

    #[Validate('accepted')]
    public $accept_privacy = false;

    public $marketing_consent = false;

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    private function validateCurrentStep()
    {
        match($this->currentStep) {
            1 => $this->validate([
                'vehicle_brand' => 'required|string|max:255',
                'vehicle_model' => 'required|string|max:255',
                'vehicle_year' => 'required|integer|min:1900|max:2025',
                'vehicle_price' => 'required|numeric|min:1000',
            ]),
            2 => $this->validate([
                'full_name' => 'required|string|max:255',
                'cpf' => 'required|string|size:11',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|size:11',
                'birth_date' => 'required|date|before:today',
            ]),
            3 => $this->validate([
                'monthly_income' => 'required|numeric|min:1000',
                'profession' => 'required|string|max:255',
                'down_payment' => 'nullable|numeric|min:0',
                'installments' => 'required|integer|min:12|max:72',
            ]),
        };
    }

    public function submit()
    {
        $this->validate();

        // Salvar no banco de dados
        FinancingProposalModel::create([
            'vehicle_brand' => $this->vehicle_brand,
            'vehicle_model' => $this->vehicle_model,
            'vehicle_year' => $this->vehicle_year,
            'vehicle_price' => $this->vehicle_price,
            'full_name' => $this->full_name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'monthly_income' => $this->monthly_income,
            'profession' => $this->profession,
            'down_payment' => $this->down_payment,
            'installments' => $this->installments,
            'marketing_consent' => $this->marketing_consent,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Proposta enviada com sucesso! Entraremos em contato em breve.');
        return redirect()->route('financing.success');
    }



    public function render()
    {
        return view('livewire.financing-proposal');
    }
}
