<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorsResource\Pages;
use App\Filament\Resources\VendorsResource\RelationManagers;
use App\Models\Vendors;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorsResource extends Resource
{
    protected static ?string $model = Vendors::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Tables\Columns\TextColumn::make('Shop_name')->sortable()->label(__('Vendor Name')),
                Tables\Columns\TextColumn::make('address')->sortable(),
                Tables\Columns\TextColumn::make('telephone')->sortable()->prefix('+'),
                Tables\Columns\TextColumn::make('kra_pin'),
                Tables\Columns\TextColumn::make('business_permit_number'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->dateTime('d-m-y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendors::route('/create'),
            'edit' => Pages\EditVendors::route('/{record}/edit'),
        ];
    }
}
