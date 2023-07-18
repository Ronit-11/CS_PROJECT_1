<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource\Widgets\userWidget;
use App\Models\User;
use App\Models\Vendors;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                /*Forms\Components\TextInput::make('email'),*/
                Forms\Components\TextInput::make('email')->required()->autofocus()->unique(ignoreRecord: true)->email()
                    ->helperText('password should be 9 long and include uppercase ,special charatcer and number..')->label(__('User Email')),
                Forms\Components\Select::make('roles')->label(__('User Role'))->multiple()
                    ->relationship('roles', 'name')
                    ->options(Role::all()->pluck('name', 'id'))
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->label(__('User Name'))->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')->sortable()->dateTime('d-m-y'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->dateTime('d-m-y'),
            ])
            ->filters([
                /*Tables\Filters\Filter::make('email_verified_')
                ->query(fn (Builder $query): Builder => $query->where('email_verified_at', '!=', 'null'))->toggle(),*/

                Tables\Filters\SelectFilter::make('roles')->label(__('User Role'))->multiple()
                    ->relationship('roles', 'name'),

                Tables\Filters\TernaryFilter::make('email_verified_at')->label(__('Email Verification Status'))
                    ->placeholder('All')
                    ->trueLabel('Verified Emails')
                    ->falseLabel('Unverified Emails')
                    ->nullable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array{
        return[
           userWidget::class,
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Admin');
    }


}
