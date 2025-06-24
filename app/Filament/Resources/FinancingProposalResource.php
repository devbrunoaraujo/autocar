<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancingProposalResource\Pages;
use App\Filament\Resources\FinancingProposalResource\RelationManagers;
use App\Models\FinancingProposalModel;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Car;
use App\Models\Customer;git 
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;


class FinancingProposalResource extends Resource
{
    protected static ?string $model = FinancingProposalModel::class;

    protected static ?string $modelLabel = 'Propostas de financiamento';

    protected static ?string $navigationIcon = 'fas-money-bill-alt';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Fieldset::make('Informações do Cliente')
                    ->schema([
                        
                        Select::make('vehicle_brand')
                            ->label('Marca')
                            ->options(fn () => Car::query()
                                ->select('marca_nome')
                                ->distinct()
                                ->pluck('marca_nome', 'marca_nome') // chave = brand, valor = brand
                                ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (callable $set) {
                                $set('vehicle_model', null);
                                $set('vehicle_year', null);
                                $set('vehicle_price', null);
                            }),

                        Select::make('vehicle_model')
                            ->label('Modelo')
                            ->options(function (callable $get) {
                                $selectedBrand = $get('vehicle_brand'); // Aqui recupera a marca escolhida

                                if (!$selectedBrand) {
                                    return [];
                                }

                                return Car::where('marca_nome', $selectedBrand)
                                    ->pluck('modelo_nome', 'modelo_nome') // chave = model, valor = model
                                    ->toArray();
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive(),
                            
                        Select::make('vehicle_year')
                            ->label('Ano')
                            ->options(function (callable $get) {
                                $selectedModel = $get('vehicle_model'); // Aqui recupera a marca escolhida

                                if (!$selectedModel) {
                                    return [];
                                }

                                return Car::where('modelo_nome', $selectedModel)
                                    ->pluck('ano_nome', 'ano_nome') // chave = model, valor = model
                                    ->toArray();
                            })
                            ->dehydrateStateUsing(function (string $state) {
                                return preg_replace('/\D/', '', strtok($state, ' '));
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive(),

                        Select::make('vehicle_price')
                            ->label('Valor')
                            ->options(function (callable $get) {
                                $selectedYear = $get('vehicle_year'); // Aqui recupera a marca escolhida

                                if (!$selectedYear) {
                                    return [];
                                }

                                return Car::where('ano_nome', $selectedYear)
                                    ->pluck('preco', 'preco') // chave = model, valor = model
                                    ->toArray();
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive(),
                        


                        TextInput::make('full_name')
                            ->required()
                            ->label('Nome completo'),
                            
                            TextInput::make('cpf')
                            ->required()
                            ->mask('999.999.999-99')
                            ->dehydrateStateUsing(fn (string $state) => preg_replace('/\D/', '', $state))
                            ->label('CPF'),

                            TextInput::make('email')
                            ->required()
                            ->label('email')
                            ->email(),

                            TextInput::make('phone')
                            ->required()
                            ->tel() 
                            ->mask('(99) 9 9999-9999')
                            ->dehydrateStateUsing(fn (string $state) => preg_replace('/\D/', '', $state))
                            ->label('Telefone/whatsApp'),

                            DatePicker::make('birth_date')
                            ->required()
                            ->label('Data nasc.'),

                            TextInput::make('monthly_income')
                            ->required()
                            ->label('Renda Mensal'),

                            TextInput::make('profession')
                            ->required()
                            ->label('Profissão'),

                            TextInput::make('down_payment')
                            ->required()
                            ->label('Entrada'),

                            Select::make('installments')
                            ->required()
                            ->options([
                                '12' => '12x',
                                '18' => '18x',
                                '24' => '24x',
                                '36' => '36x',
                                '48' => '48x',
                                '60' => '60x',
                                '72' => '72x',
                            ])
                            ->label('Parcelas'),

                            Select::make('marketing_consents')
                            ->options([
                                '0' => 'Não',
                                '1' => 'Sim'
                            ])
                            ->label('Deseja receber promoções?'),

                            Select::make('status')
                            ->required()
                            ->options([
                                'pendente' => 'pendente',
                                'aprovada' => 'aprovada',
                                'recusada' => 'recusada',
                                'em_analise' => 'em analise'
                            ])
                            ->label('Status'),
                            

                            TextInput::make('reviewed_at')
                                ->label('Visto em:')
                                ->readOnly()
                                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('d/m/Y H:i:s') : null),

                            TextInput::make('reviewed_by')
                                ->label('Visto por:')
                                ->readOnly()
                                ->formatStateUsing(fn ($state) => $state ? \App\Models\User::find($state)?->name : null),

                            TextInput::make('created_at')
                            ->label('Criado em:'),

                            TextInput::make('updated_at')
                            ->label('Última atualização:'),  
                            
                            RichEditor::make('notes')
                            ->label('Observações'),
                    ])
                          
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
                    'warning' => 'pendente',
                    'success' => 'aprovada',
                    'danger' => 'recusada',
                ]),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Proposta gerada em')
                ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('full_name')
                ->label('Cliente'),
                Tables\Columns\TextColumn::make('phone')
                ->label('Telefone')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('addCustomer')
                    ->label('Adicionar como Cliente')
                    ->icon('heroicon-o-user-plus')
                    ->requiresConfirmation()
                    ->color('success')
                    ->action(function ($record) {
                        // 1️⃣ Verifica se o cliente existe por e‑mail
                        $customer = Customer::where('email', $record->email)->first();

                        // 2️⃣ Se não existir, cria
                        if (! $customer) {
                            $customer = Customer::create([
                                'full_name'  => $record->full_name,
                                'phone' => $record->phone,
                                'email' => $record->email,
                                'cpf'   => $record->cpf,
                                'birth_date' => $record->birth_date,
                                'monthly_income' => $record->monthly_income,
                                'profession' => $record->profession,
                            ]);

                            $mensagem = 'Cliente criado e vinculado com sucesso!';
                        } else {
                            $mensagem = 'Cliente encontrado e vinculado com sucesso!';
                        }

                        // 3️⃣ Vincula o cliente à proposta atual
                        $record->customer_id = $customer->id;
                        $record->save();

                    // 4️⃣ Notificação
                    Notification::make()
                        ->title($mensagem)
                        ->success()
                        ->send();
                    }),
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
