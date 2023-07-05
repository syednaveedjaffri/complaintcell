<?php

namespace App\Filament\Resources;

use Filament\Forms;
// use Filament\Tables;
use App\Models\Faculty;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\FacultyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FacultyResource\RelationManagers;
use App\Filament\Resources\FacultyResource\Pages\EditFaculty;
use App\Filament\Resources\FacultyResource\Pages\CreateFaculty;
use App\Filament\Resources\FacultyResource\Pages\ListFaculties;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use App\Filament\Resources\FacultyResource\RelationManagers\FacultyRelationManager;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Campus Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('campus_id')
                        ->relationship('campus', 'campus_name')
                        ->required(),
                    TextInput::make('faculty_name')->required(),
                    // TextInput::make('extension')->hidden(), TO SEE THE EXTNSION FOM DEPARTMENT TABLE
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('campus.campus_name')->label('Campus Name')->sortable()->searchable(),

                TextColumn::make('faculty_name')->label('Faculty Name')->sortable()->searchable(),
                // TextColumn::make('departments.extension')->sortable()->searchable()      "ITS working" TO SEE THE EXTENSION FROM DEPARTMENT TABLE THROUGH hasMANY RELATIONSHIP
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
               DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FacultyRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaculties::route('/'),
            'create' => Pages\CreateFaculty::route('/create'),
            'edit' => Pages\EditFaculty::route('/{record}/edit'),
        ];
    }

}
