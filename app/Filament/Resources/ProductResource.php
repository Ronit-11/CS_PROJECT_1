<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\CategorHasRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendors;
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
use Illuminate\Support\Carbon;
use Livewire\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->autofocus()->helperText('Category Name should be unique.')->label(__('Product Name')),
                Forms\Components\TextInput::make('details')->required(),
                Forms\Components\TextInput::make('product')->required()->label(__('Product Code'))->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('price')->numeric()->integer()->required(),
                Select::make('vendors_id')->label(__('Vendor'))
                    ->relationship('vendorHas', 'id')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->Shop_name}")
                    ->options(Vendors::all()->pluck('Shop_name', 'id'))
                    ->searchable(),

                /*Select::make('categorHas')
                    ->relationship('categorHas', 'id'),*/
                FileUpload::make('image')->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string{
                           $filename = $file->hashName();
                           $name = explode('.', $filename);
                           return (string) str('Images/Products/'.$name[0].'.png');
                       })->maxSize(3072)->image()->label('Product Image'),

                Select::make('category_id')->label(__('Category'))
                    ->relationship('categorHas', 'id')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->categoryName}")
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
                Tables\Columns\TextColumn::make('name')->sortable()->label(__('Product Name'))->searchable(),
                Tables\Columns\TextColumn::make('details'),
                /*Tables\Columns\TextColumn::make('vendors_id')->sortable(),*/
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('product')->sortable()->label(__('Product Code'))->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('price')->sortable(),
                /*Tables\Columns\TextColumn::make('category_id')->sortable(),*/
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-m-y')->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Created from:'),
                        Forms\Components\DatePicker::make('created_until')->label('Created until:'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Created from ' . Carbon::parse($data['created_from'])->toFormattedDateString();
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Created until ' . Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),

                Tables\Filters\SelectFilter::make('category_id')->label(__('Category'))->multiple()
                    ->relationship('categorHas', 'id')
                    ->options(Category::all()->pluck('categoryName', 'id')),

                Tables\Filters\SelectFilter::make('vendors_id')->label(__('Vendor'))->multiple()
                    ->relationship('vendorHas', 'id')
                    ->options(Vendors::all()->pluck('Shop_name', 'id')),
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

    public static function getEloquentQuery(): Builder
    {
        if(Auth()->user()->hasRole('Vendor')){
            $userId = Auth()->id();
            $vendorID = Vendors::query()->where('users_id','=',$userId)->pluck('id');
            return parent::getEloquentQuery()->where('vendors_id','=',$vendorID);
        }elseif (Auth()->user()->hasRole('Admin')){
            return parent::getEloquentQuery(); // TODO: Change the autogenerated stub
        }

    }
}
