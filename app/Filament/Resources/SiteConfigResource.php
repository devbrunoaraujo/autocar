<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteConfigResource\Pages;
use App\Filament\Resources\SiteConfigResource\RelationManagers;
use App\Models\SiteConfig;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class SiteConfigResource extends Resource
{
    protected static ?string $model = SiteConfig::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Configurações';


    public static function form(Form $form): Form
    {
         return $form
            ->schema([

                Fieldset::make('Configurações do Site')
                ->schema([
                    TextInput::make('telefone')->label('Telefone')->required(),
                    TextInput::make('email')->label('E-mail')->email()->required(),
                    Textarea::make('endereco')->label('Endereço')->rows(2),
                    FileUpload::make('banners')
                        ->label('Banners do Slideshow')
                        ->multiple()
                        ->image()
                        ->imageEditor()
                        ->imagePreviewHeight('150')
                        ->maxSize(2048)
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->directory('banners')
                        ->reorderable()
                        ->downloadable()
                        ->maxFiles(5)
                        ->disk('public')
                        ->visibility('public')
                        ->preserveFilenames()
                        ->dehydrated()
                        ->deleteUploadedFileUsing(function ($file) {
                            Storage::disk('public')->delete($file);
                        })

                ])->columns(1)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSiteConfigs::route('/'),
            'create' => Pages\CreateSiteConfig::route('/create'),
            'edit' => Pages\EditSiteConfig::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}
