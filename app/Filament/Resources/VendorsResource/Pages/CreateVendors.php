<?php

namespace App\Filament\Resources\VendorsResource\Pages;

use App\Filament\Resources\VendorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVendors extends CreateRecord
{
    protected static string $resource = VendorsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');

    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Vendor Created.';
    }
}
