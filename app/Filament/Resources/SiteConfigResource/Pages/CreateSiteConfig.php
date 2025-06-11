<?php

namespace App\Filament\Resources\SiteConfigResource\Pages;

use App\Filament\Resources\SiteConfigResource;
use App\Models\SiteConfig;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSiteConfig extends CreateRecord
{
    protected static string $resource = SiteConfigResource::class;

    public function mount(): void
    {
        if (SiteConfig::query()->exists()) {
            Notification::make()
                ->title('Já existe uma configuração cadastrada.')
                ->danger()
                ->send();

            $this->redirect(SiteConfigResource::getUrl('index'));
        }

        parent::mount();
    }
}
