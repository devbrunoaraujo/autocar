<?php

namespace App\Filament\Resources\FinancingProposalResource\Pages;

use App\Filament\Resources\FinancingProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditFinancingProposal extends EditRecord
{
    protected static string $resource = FinancingProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['reviewed_at'] = now();
        $data['reviewed_by'] = Auth::id();
        
        return $data;
    }
}
