<?php

namespace App\Filament\Resources\FinancingProposalResource\Pages;

use App\Filament\Resources\FinancingProposalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFinancingProposals extends ListRecords
{
    protected static string $resource = FinancingProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
