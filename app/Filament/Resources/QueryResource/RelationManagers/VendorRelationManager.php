<?php

namespace App\Filament\Resources\QueryResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class VendorRelationManager extends RelationManager
{
    protected static string $relationship = 'vendor';

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('vendor_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')

                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('state')
                    ->required()
                    ->maxLength(255),
                TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                DateTimePicker::make('send_to_vendor')
                    ->label('Send To Vendor'),
                DateTimePicker::make('received_from_vendor')
                    ->label('Received From Vendor')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name'),
                Tables\Columns\TextColumn::make('vendor_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('queries.send_to_vendor')->label('Send to Vendor')->dateTime('M j, Y')->searchable(),
                Tables\Columns\TextColumn::make('queries.received_from_vendor')->label('Received from Vendor')->dateTime('M j, Y')->searchable(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
