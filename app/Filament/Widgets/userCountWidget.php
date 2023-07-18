<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendors;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class  userCountWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Users', User::count())->Icon('heroicon-s-users'),
            Card::make('Products', Product::count())->Icon('heroicon-s-shopping-bag'),
            Card::make('Vendors', Vendors::count())->Icon('heroicon-s-collection'),
        ];
    }

    public static function canView(): bool
    {
        return auth()->user()->hasRole('Admin');
    }
}
