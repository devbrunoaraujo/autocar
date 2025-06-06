<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Contracts\FipeApiInterface;
//use //App\Helpers\FormMasks;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações do Veículo')
                    ->schema([
                        Forms\Components\Select::make('marca')
                            ->label('Marca')
                            ->options(fn() => app(FipeApiInterface::class)->listarMarcas())
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('modelo', null)),

                        Forms\Components\Select::make('modelo')
                            ->label('Modelo')
                            ->options(function (callable $get) {
                                $marca = $get('marca');
                                if (!$marca) return [];
                                return app(FipeApiInterface::class)->listarModelos($marca);
                            })
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('ano', null)),

                        Forms\Components\Select::make('ano')
                            ->label('Ano')
                            ->options(function (callable $get) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                if (!$marca || !$modelo) return [];
                                return app(FipeApiInterface::class)->listarAnos($marca, $modelo);
                            })
                            ->reactive(),

                        Forms\Components\Placeholder::make('preco_fipe')
                            ->label('Preço FIPE')
                            ->content(function (callable $get) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                $ano = $get('ano');

                                if (!$marca || !$modelo || !$ano) return 'Selecione todos os campos';

                                $result = app(FipeApiInterface::class)->consultarPreco($marca, $modelo, $ano);
                                return $result['Valor'] ?? 'Preço não encontrado';
                            }),

                        Forms\Components\TextInput::make('preco')
                            ->label('Preço Final (opcional)')
                            ->prefix('R$')
                            ->mask('999.999,99', '.', ',', 2)
                            ->nullable(),

                        Forms\Components\MarkdownEditor::make('content'),
                    ])
                    ->columns(2) // Se quiser organizar os campos em colunas
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modelo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ano')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
