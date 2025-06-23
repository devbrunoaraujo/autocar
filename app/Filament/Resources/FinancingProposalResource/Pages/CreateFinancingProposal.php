<?php

namespace App\Filament\Resources\FinancingProposalResource\Pages;

use App\Filament\Resources\FinancingProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateFinancingProposal extends CreateRecord
{
    protected static string $resource = FinancingProposalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['reviewed_at'] = now();
        $data['reviewed_by'] = Auth::id();
        
        return $data;
    }
}
