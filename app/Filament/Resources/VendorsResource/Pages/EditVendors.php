<?php

namespace App\Filament\Resources\VendorsResource\Pages;

use App\Filament\Resources\VendorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendors extends EditRecord
{
    protected static string $resource = VendorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Vendor Updated.';
    }
}
