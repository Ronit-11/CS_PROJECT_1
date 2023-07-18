<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorsResource\Pages;
use App\Filament\Resources\VendorsResource\RelationManagers;
use App\Models\User;
use App\Models\Vendors;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorsResource extends Resource
{
    protected static ?string $model = Vendors::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Shop_name')->unique(ignoreRecord: true)->required(),
                Forms\Components\TextInput::make('address')->required(),
                Forms\Components\TextInput::make('telephone')->unique(ignoreRecord: true)->required()->numeric()->integer(),
                Forms\Components\TextInput::make('kra_pin')->unique(ignoreRecord: true)->required(),
                Forms\Components\TextInput::make('business_permit_number')->unique(ignoreRecord: true)->required(),

                Forms\Components\Select::make('users_id')->label(__('Vendor'))
                    ->relationship('UserHas', 'users_id')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name}")
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()->multiple()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Shop_name')->sortable()->label(__('Vendor Name'))->searchable(),
                Tables\Columns\TextColumn::make('address')->sortable(),
                Tables\Columns\TextColumn::make('telephone')->sortable()->prefix('+')->searchable(),
                Tables\Columns\TextColumn::make('kra_pin'),
                Tables\Columns\TextColumn::make('users_id')->searchable()->sortable(),
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

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Admin');
    }



}
