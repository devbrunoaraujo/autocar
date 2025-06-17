<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Contracts\FipeApiInterface;
use App\Services\ImageUploadService;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
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
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Storage;


class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'bi-car-front-fill';

    protected static ?string $modelLabel = 'Carro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Informações do Veículo')
                    ->schema([

                        //select marca
                        Select::make('marca')
                            ->label('Marca')
                            ->options(fn() => app(FipeApiInterface::class)->listarMarcas())
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $get, callable $set) {
                                $marca = $get('marca');
                                $set('modelo', null);
                                if ($marca) {
                                    $marcaNome = app(FipeApiInterface::class)->listarMarcas()[$marca] ?? null;
                                    $set('marca_nome', $marcaNome);
                                }
                            }),

                        //Select modelo
                        Select::make('modelo')
                            ->label('Modelo')
                            ->options(function (callable $get) {
                                $marca = $get('marca');
                                if (!$marca) return [];
                                return app(FipeApiInterface::class)->listarModelos($marca);
                            })
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $get, callable $set) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                $set('ano', null);
                                if ($marca && $modelo) {
                                    $modeloNome = app(FipeApiInterface::class)->listarModelos($marca)[$modelo] ?? null;
                                    $set('modelo_nome', $modeloNome);
                                }
                            }),


                        //select ano
                        Select::make('ano')
                            ->label('Ano')
                            ->options(function (callable $get) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                if (!$marca || !$modelo) return [];
                                return app(FipeApiInterface::class)->listarAnos($marca, $modelo);
                            })
                            ->reactive()
                            ->required()
                            ->afterStateUpdated(function (callable $get, callable $set) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                $ano = $get('ano');
                                if ($marca && $modelo && $ano) {
                                    $anoNome = app(FipeApiInterface::class)->listarAnos($marca, $modelo)[$ano] ?? null;
                                    $set('ano_nome', $anoNome);
                                }
                            }),


                        // Campos ocultos que serão preenchidos e salvos no banco
                        Hidden::make('marca_nome'),
                        Hidden::make('modelo_nome'),
                        Hidden::make('ano_nome'),


                        //preço fipe
                        Placeholder::make('preco_fipe')
                            ->label('Preço FIPE')
                            ->content(function (callable $get) {
                                $marca = $get('marca');
                                $modelo = $get('modelo');
                                $ano = $get('ano');
                                if (!$marca || !$modelo || !$ano) return 'Selecione todos os campos';
                                $result = app(FipeApiInterface::class)->consultarPreco($marca, $modelo, $ano);
                                return $result['Valor'] ?? 'Preço não encontrado';
                            }),

                        TextInput::make('preco')
                            ->label('Preço Final')
                            ->numeric()
                            ->prefix('R$')
                            ->required(),

                        TextInput::make('quilometragem')
                            ->label('Quilometragem')
                            ->numeric()
                            ->prefix('Km')
                            ->required(),

                    ])
                    ->columns(1),

                Fieldset::make('Galeria do Veículo')

                    ->schema([
                        //Galeria do veículo
                        FileUpload::make('thumb')
                            ->label('Thumb')
                            ->image()
                            ->disk('public')
                            ->directory('carros/thumbs')
                            ->preserveFilenames()
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->dehydrated()
                            ->saveUploadedFileUsing(function ($file) {
                                return ImageUploadService::saveWithWebp(
                                    file: $file,
                                    dir: 'carros/thumbs',
                                    width: 640,
                                    quality: 80,
                                    disk: 'public'
                                );
                            })
                            ->deleteUploadedFileUsing(function ($file) {
                                Storage::disk('public')->delete($file);
                            }),

                        //Thumb que aparece na tabela
                        Forms\Components\FileUpload::make('images')
                            ->label('Imagens do veículo')
                            ->multiple()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('carros/galeria')
                            ->imagePreviewHeight('150')
                            ->maxSize(2048)
                            ->helperText('Você pode enviar múltiplas imagens do carro.')
                            ->reorderable()
                            ->preserveFilenames()
                            ->disk('public')
                            ->visibility('public')
                            ->dehydrated()
                            ->saveUploadedFileUsing(function ($file) {
                                return ImageUploadService::saveWithWebp(
                                    file: $file,
                                    dir: 'carros/galeria',
                                    width: 1280,
                                    quality: 75,
                                    disk: 'public'
                                );
                            })
                            ->deleteUploadedFileUsing(function ($file) {
                                Storage::disk('public')->delete($file);
                            }),


                    ])->columns(1),


                Fieldset::make('Opcionais')
                    ->schema([

                        //options que carrega os opcionais
                        Forms\Components\CheckboxList::make('options')
                            ->label('Opcionais')
                            ->relationship('options', 'name')
                            ->columns(4)
                            ->searchable()
                            ->bulkToggleable()
                            ->helperText('Selecione os opcionais disponíveis para este carro.'),

                    ])->columns(1),

                RichEditor::make('comentario')
                        ->label('Comentário sobre o veículo')
                        ->helperText('Máximo de 500 caracteres (sem contar HTML)')
                        ->columnSpanFull()
            ]);

    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                /*Tables\Columns\ImageColumn::make('thumb')
                    ->label('Thumb')
                    ->circular()
                    ->disk('public')
                    ->visibility('visible')
                    ->size(50),*/

                ToggleColumn::make('is_active')
                    ->label('Ativo')
                    ->onIcon('heroicon-o-check-circle')
                    ->offIcon('heroicon-o-x-circle')
                    ->afterStateUpdated(function ($record, $state) {
                        // Se desativar, remover destaque
                        if (!$state) {
                            $record->update(['is_featured' => false]);
                        }
                    }),

                ToggleColumn::make('is_featured')
                    ->label('Destaque')
                    ->onIcon('heroicon-o-star')
                    ->offIcon('heroicon-o-star')
                    ->disabled(fn ($record) => ! $record->is_active),

                Tables\Columns\TextColumn::make('marca_nome')
                    ->label('Marca')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('modelo_nome')
                    ->label('Modelo')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ano_nome')
                    ->label('Ano')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço Final')
                    ->money('BRL', locale: 'pt_BR')
                    ->sortable(),
            ])
            ->filters([
                // Aqui você pode adicionar filtros por marca, modelo, ano ou outros
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
