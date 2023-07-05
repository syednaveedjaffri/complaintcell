<?php

namespace App\Filament\Resources;


use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Illuminate\Http\Request;
use Livewire\Component;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
// use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Spatie\SimpleExcel\SimpleExcelWriter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $recordTitleAttribute = 'title';//for global search

    // protected static bool $shouldRegisterNavigation = false; IT HIDES the USERMENU

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    // Forms\Components\TextInput::make('designation')
                    // ->required()
                    // ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('designation')->label('Designation')
                //     // ->required()
                //     ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn(Page $livewire):bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->same('passwordConfirmation')
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                    TextInput::make('passwordConfirmation')
                    ->password()
                    ->label('Password Confirmation')
                    ->required(fn(Page $livewire):bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->dehydrated(false),
                    Forms\Components\Toggle::make('is_admin'),

                    // Select::make('roles')->multiple()->preload() OK HAE
                    CheckboxList::make('roles')
                    ->relationship('roles','name')
                    ->columns(2)
                    ->helperText('Choose One Only!')
                    ->required(),

            ])


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                // Tables\Columns\TextColumn::make('designation')->searchable()->limit(10),
                Tables\Columns\BooleanColumn::make('is_admin')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('roles.name')->searchable(),
                // Tables\Columns\TextColumn::make('designation')->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')->dateTime('d-M-Y'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-M-Y'),
                // TextColumn::make('last_login_at')->dateTime('d-M-Y'),
                TextColumn::make('ip_address'),
                // get user ip address

            ])
            ->defaultSort('name','ASC')
            ->filters([
                // Filter::make('verified')
                // ->query(fn(Builder $query):Builder =>$query->whereNotNull('email_verified_at')),
                // Filter::make('unverified')
                // ->query(fn(Builder $query):Builder =>$query->whereNull('email_verified_at')),
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export')
                //     ->defaultPageOrientation('landscape')
                //     ->csvDelimiter(',') // Delimiter for csv files
                //     ->modifyExcelWriter(fn (SimpleExcelWriter $writer) => $writer->nameCurrentSheet('Sheet')) // Modify SimpleExcelWriter before download
                //     ->modifyPdfWriter(fn (PdfWrapper $writer) => $writer->setPaper('a4', 'landscape'))
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RolesRelationManager::class,
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


public static function getNavigationBadge(): ?string
{
    return self::getModel()::count();
}
// public static function getGloballySearchableAttributes(): array
// {
//     return ['name','email'];
// }
public static function getGloballySearchableAttributes(): array
{
    return ['name', 'email'];
}

public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
}

// public function fields()
// {
//     return [
//         // other fields
//         TextColumn::make('Last Login IP')->exceptOnForms(),
//     ];
// }

}
