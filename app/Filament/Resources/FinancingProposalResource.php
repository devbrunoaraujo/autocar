<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancingProposalResource\Pages;
use App\Filament\Resources\FinancingProposalResource\RelationManagers;
use App\Models\FinancingProposalModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FinancingProposalResource extends Resource
{
    protected static ?string $model = FinancingProposalModel::class;

    protected static ?string $modelLabel = 'Propostas de financiamento';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->colors([
                    'primary' => 'Pendente',
                    'success' => 'Aprovada',
                    'danger' => 'Recusada',
                ]),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Proposta gerada em')
                ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('full_name')
                ->label('Cliente'),
                Tables\Columns\TextColumn::make('cpf')
                ->label('CPF'),
                Tables\Columns\TextColumn::make('email')
                ->label('E-mail'),
                Tables\Columns\TextColumn::make('phone')
                ->label('Telefone')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinancingProposals::route('/'),
            'create' => Pages\CreateFinancingProposal::route('/create'),
            'edit' => Pages\EditFinancingProposal::route('/{record}/edit'),
        ];
    }
}
