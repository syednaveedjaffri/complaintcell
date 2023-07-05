<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Complaincategory;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComplaincategoryResource\Pages;
use App\Filament\Resources\ComplaincategoryResource\RelationManagers;

class ComplaincategoryResource extends Resource
{
    protected static ?string $model = Complaincategory::class;


    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Complaint Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category_name')->required()
                ->autofocus(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('complain_category_name')->label('Category Name')->sortable()->searchable()
                // ->defaultSort('category_name','ASC'),
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
            'index' => Pages\ListComplaincategories::route('/'),
            'create' => Pages\CreateComplaincategory::route('/create'),
            'edit' => Pages\EditComplaincategory::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
}

}
