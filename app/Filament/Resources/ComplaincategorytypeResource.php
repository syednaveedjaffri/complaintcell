<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\Complaincategorytype;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComplaincategorytypeResource\Pages;
use App\Filament\Resources\ComplaincategorytypeResource\RelationManagers;
use Filament\Tables\Columns\Column;

class ComplaincategorytypeResource extends Resource
{
    protected static ?string $model = Complaincategorytype::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Complaint Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('complaincategory_id')
                ->relationship('complaincategoryname', 'complain_category_name')
                ->required()
                ->autofocus(),

                TextInput::make('complain_category_type')->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('complaincategoryname.complain_category_name')->label('Complain Category Name')->searchable(),
                TextColumn::make('complain_category_type')->label('Complain Category Type')->searchable()
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
            'index' => Pages\ListComplaincategorytypes::route('/'),
            'create' => Pages\CreateComplaincategorytype::route('/create'),
            'edit' => Pages\EditComplaincategorytype::route('/{record}/edit'),
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
