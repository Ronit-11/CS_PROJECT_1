<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-s-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('categoryName')->required()->autofocus()->unique()
                    ->helperText('Category Name should be unique.')->label(__('Category Name')),
                /*automaticaly add the name input into slug
                  ->reactive()->afterStateUpdated(function (Closure $set, $state){
                    $set('slug', Str::slug($state));
                to get first and last word of name
                    $nameparts = explode(' ',trim($state));
                    $firstword = array_shift($nameparts);
                    $secondWord = array_pop($nameparts);
                    $set('category_code', Str::substr($firstword,0,1).Str::substr($secondWord,0,1));
                    })
                to capitalize an input(after its make)
                ->dehydrateStateUsing(fn ($state) => Str::upper($state))
                disable an input state
                ->disabled()
                helpertext
                ->helperText('text')*/

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categoryName')->sortable()->label(__('Category Name')),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-m-y')->sortable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
