<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\CategorHasRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->autofocus()->unique()->helperText('Category Name should be unique.')->label(__('Product Name')),
                Forms\Components\TextInput::make('details')->required(),
                Forms\Components\TextInput::make('product')->required()->unique()->label(__('Product Code')),
                Forms\Components\TextInput::make('price')->numeric()->integer()->required(),

                /*Select::make('categorHas')
                    ->relationship('categorHas', 'id'),*/
                FileUpload::make('image')->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string{
                           $filename = $file->hashName();
                           $name = explode('.', $filename);
                           return (string) str('Images/Products/'.$name[0].'.png');
                       })->maxSize(3072)->image()->label('Product Image'),

                Select::make('category_id')->label(__('Category'))
                    ->relationship('categorHas', 'id')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->categoryName}")->columns(2)
                    ->options(Category::all()->pluck('categoryName', 'id'))
                    ->searchable(),

                /*CheckboxList::make('categorHas')->label(__('Category'))
                    ->relationship('categorHas', 'id')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->categoryName}")->columns(2),*/
                Forms\Components\TextArea::make('description')->minlength('10')->maxLength(300)->required(),
                /*Tables\Columns\TextColumn::make('vendors_id')->sortable(),

                Tables\Columns\TextColumn::make('category_id')->sortable(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->label(__('Product Name')),
                Tables\Columns\TextColumn::make('details'),
                /*Tables\Columns\TextColumn::make('vendors_id')->sortable(),*/
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('product')->sortable()->label(__('Product Code')),
                /*Tables\Columns\ImageColumn::make('image'),*/
                Tables\Columns\TextColumn::make('price')->sortable(),
                /*Tables\Columns\TextColumn::make('category_id')->sortable(),*/
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
           //CategorHasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
