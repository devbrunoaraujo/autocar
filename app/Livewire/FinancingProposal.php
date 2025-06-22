<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\FinancingProposalModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FinancingProposal extends Component
{
    public $currentStep = 1;
    public $car_id = null;
    public $list_cars = [];
    public $totalSteps = 4;

    public function mount()
    {
        $this->list_cars = Car::all();
    }

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

    #[Validate('required|numeric|digits:11')]
    public $cpf = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|numeric|digits:11')]
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

    // CORREÇÃO PRINCIPAL: Método deve ser chamado quando car_id muda
    public function updatedCarId($value)
    {
         // Limpa os campos primeiro
        $this->reset(['vehicle_brand', 'vehicle_model', 'vehicle_year', 'vehicle_price']);

        if (empty($value)) {
            return;
        }

        $car = Car::find($value);

        if ($car) {
            // Extrai apenas o ano do campo ano_nome (ex: "2025 Gasolina" -> 2025)
            $year = $this->extractYearFromString($car->ano_nome);

            // Use fill() para garantir que todas as propriedades sejam atualizadas
            $this->fill([
                'vehicle_brand' => $car->marca_nome,
                'vehicle_model' => $car->modelo_nome,
                'vehicle_year' => $year,
                'vehicle_price' => $car->preco,
            ]);
        }
    }

    /**
     * Extrai o ano de uma string como "2025 Gasolina"
     */
    private function extractYearFromString($yearString)
    {
        // Remove tudo que não for número
        $year = preg_replace('/[^0-9]/', '', $yearString);

        // Se encontrou um número de 4 dígitos que parece ser um ano válido
        if (strlen($year) >= 4) {
            $year = substr($year, 0, 4); // Pega os primeiros 4 dígitos
            $yearInt = (int) $year;

            // Valida se é um ano válido (entre 1900 e 2030)
            if ($yearInt >= 1900 && $yearInt <= 2030) {
                return $yearInt;
            }
        }

        // Se não conseguiu extrair, tenta usar regex mais específica
        if (preg_match('/(\d{4})/', $yearString, $matches)) {
            return (int) $matches[1];
        }

        // Fallback: retorna null ou um valor padrão
        return null;
    }

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
                'cpf' => 'required|numeric|digits:11',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric|digits:11',
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
            'status' => 'pendente',
        ]);

        session()->flash('success', 'Proposta enviada com sucesso! Entraremos em contato em breve.');
        return redirect()->route('sucesso');
    }

    public function render()
    {
        return view('livewire.financing-proposal');
    }
}
