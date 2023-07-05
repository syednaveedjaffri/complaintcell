<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vendor;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VendorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VendorResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;
    // protected static ?int $navigationSort = 6;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 2;
    // protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationGroup = 'Vendor Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('company_name')->required(),

                    TextInput::make('vendor_name')->required(),

                    TextInput::make('email')->required(),
                    TextInput::make('phone')->required(),
                    TextInput::make('address')->required(),
                    TextInput::make('city')->required(),
                    TextInput::make('state')->required()
                    // ColorColumn::make('color')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('company_name'),
                    TextColumn::make('vendor_name'),

                    TextColumn::make('email'),
                    TextColumn::make('phone'),
                    TextColumn::make('address'),
                    TextColumn::make('city'),
                    TextColumn::make('state')
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
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
