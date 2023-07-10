<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Filament\Tables;
use App\Models\Query;
use App\Models\Faculty;
use Livewire\Component;
use App\Models\Department;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\GlobalSearch\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use App\Models\Complaincategorytype;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Filament\Forms\Components\DateTimePicker;
use AlperenErsoy\FilamentExport\FilamentExport;
use App\Filament\Resources\QueryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Console\Migrations\StatusCommand;
use App\Filament\Resources\QueryResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\QueryResource\RelationManagers\VendorRelationManager;

class QueryResource extends Resource
{

    protected static ?string $model = Query::class;

    // protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Query Management';

    // protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema
            ([
                Card::make()
                    ->schema
                    ([

                                TextInput::make('complainer_name')->required(),

                                Select::make('campus_id')->label('Campus Name')->placeholder('Select a Campus')
                                    ->preload()
                                    ->autofocus()
                                    ->relationship('campus', 'campus_name')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn(callable $set) => $set('faculty_id', null)),

                                Select::make('faculty_id')->label('Faculty Name')->placeholder('Select a Faculty')
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->options(function (callable $get) {
                                        $campus = ($get('campus_id'));
                                        if ($campus) {
                                            return Faculty::where('campus_id', $campus)->pluck('faculty_name', 'id')->toArray();
                                        }

                                    })
                                    ->afterStateUpdated(fn(callable $set) => $set('department_id', null)),
                                Select::make('department_id')->label('Department Name')
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->options(function (callable $get) {
                                        $faculty = ($get('faculty_id'));
                                        if ($faculty) {
                                            return Department::where('faculty_id', $faculty)->pluck('department_name', 'id');
                                        }

                                    }),

                                    Select::make('complaincategory_id')->label('Complain Category')
                                    ->preload()
                                    ->autofocus()
                                    ->relationship('complaincategoryname', 'complain_category_name')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn(callable $set) => $set('complaincategorytype_id', null)),


                                Select::make('complaincategorytype_id')->label('Complain Category Type')


                                    ->required()
                                    ->reactive()
                                    ->options(function (callable $get)
                                     {
                                        $complaincat = ($get('complaincategory_id'));
                                        if ($complaincat) {
                                            return Complaincategorytype::where('complaincategory_id', $complaincat)->pluck('complain_category_type', 'id')->toArray();
                                        }

                                    }),

                                // Select::make('complain_id')
                                //     ->relationship('complain', 'complain_type')->required(),

                                            TextInput::make('complain_description'),


                                    TextInput::make('extension'),



                                        Select::make('status')
                                        ->options([

                                            'inprocess' => 'In Process',
                                            'repaired' => 'Repaired',
                                            'deleivered' => 'Deleivered',
                                            'pending' => 'Send To Vendor',
                                            'received' => 'Received from vendor',
                                            'dead'=>'Dead'
                                        ])
                                        ->required()
                                        // ->disablePlaceholderSelection()
                                        ->hidden(fn() => auth()->user()->hasRole('user'))
                                        ->reactive(),


                                    select::make('vendor_id')
                                    ->relationship('vendor','company_name')
                                    ->label('Vendor')

                                            ->requiredWith('status')
                                                ->visible(fn(Closure $get) => $get('status') == 'pending'),

                                                DateTimePicker::make('send_to_vendor')
                                                ->label('Send to Vendor Date')
                                                ->minDate(now())
                                                ->maxDate(Carbon::now()->addDays(31))
                                                ->requiredWith('status')
                                                ->visible(fn(Closure $get) => $get('status') == 'pending')

                                                ->hidden(fn() => !auth()->user()->hasRole('user')),
                                                DateTimePicker::make('received_from_vendor')
                                                ->label('Received From Vendor Date')
                                                ->minDate(now())
                                                ->maxDate(Carbon::now()->addDays(31))
                                                ->requiredWith('status')
                                                ->visible(fn(Closure $get) => $get('status') == 'repaired')

                                                ->hidden(fn() => auth()->user()->hasRole('user')),
                                                DateTimePicker::make('received_from_vendor')

                                                ->label('Received From Vendor Date')
                                                ->minDate(now())
                                                ->maxDate(Carbon::now()->addDays(31))
                                                ->requiredWith('status')
                                                ->visible(fn(Closure $get) => $get('status') == 'received')

                                                ->hidden(fn() => auth()->user()->hasRole('user')),

                                                DateTimePicker::make('send_to_dept')
                                                ->label('Send to Department Date')
                                                ->minDate(now())
                                                ->maxDate(Carbon::now()->addDays(31))
                                                ->requiredWith('status')
                                                ->visible(fn(Closure $get) => $get('status') == 'deleivered')

                                                ->hidden(fn() => auth()->user()->hasRole('user')),

                                                // ->disabledDates(['2022-10-02', '2022-10-05', '2022-10-15'])











                                ]),

            ]);

    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('complainer_name')->label('Complainer Name'),

                // ->toggleable(), OK HAE
                TextColumn::make('faculty.faculty_name')->searchable()->sortable(),
                TextColumn::make('department.department_name')->searchable()->sortable(),
                TextColumn::make('complaincategoryname.complain_category_name')->label('Category Name')->searchable()->sortable(),
                TextColumn::make('complaincategorytype.complain_category_type')->label('Category Type')->searchable()->sortable(),
                // TextColumn::make('complain.complain_type')->searchable()->sortable(),
                TextColumn::make('complain_description')->label('Further Description About Complain'),
                TextColumn::make('extension')->label('Extension')->sortable(),


                TextColumn::make('created_at')->dateTime()->searchable()->sortable()->label('Complain Date'),
                TextColumn::make('send_to_dept')->dateTime()->searchable()->sortable()->label('Send to Department Date')
                ->hidden(fn() => auth()->user()->hasRole('user')),
                TextColumn::make('send_to_vendor')->dateTime()->searchable()->sortable()->label('Send to Vendor Date')



                ->hidden(fn() => auth()->user()->hasRole('user')),
                TextColumn::make('received_from_vendor')->dateTime()->searchable()->sortable()->label('Received from Vendor Date')
                ->hidden(fn() => auth()->user()->hasRole('user')),


                    BadgeColumn::make('status')
                    ->colors([

                        'secondary' => 'repaired',
                        'primary' => 'inprocess',
                        'success' => 'deleivered',
                        'danger' => 'send_to_vendor',
                        'success' => 'received',
                        'danger' => 'dead'

                        // ->IconColumn([
                        //     // 'heroicon-o-x',
                        //     'heroicon-o-document' => 'repaired',
                        //     'heroicon-o-refresh' => 'inprocess',
                        //     'heroicon-o-truck' => 'deleivered',
                        //     'heroicon-o-pencil' =>'send_to_vendor',
                        //     'heroicon-o-document' => 'received',

                    ]),

                TextColumn::make('vendor.company_name')->label('Vendor Name')
                ->searchable()
                ->sortable()
                ->hidden('status')
                ->hidden(fn() => auth()->user()->hasRole('user')),



            ])

            // ->defaultSort('faculty.faculty_name','asc')

            ->filters([
                // Filter::make('created_at')
                // ->form([DatePicker::make('date')])
                // // ...
                // ->indicateUsing(function (array $data): ?string {
                //     if (! $data['date']) {
                //         return null;
                //     }

                //     return 'Created at ' . Carbon::parse($data['date'])->toFormattedDateString();
                // }),OK HAE
                SelectFilter::make('All Campuse')
                    ->relationship('campus', 'campus_name')->hidden(fn() => auth()->user()->hasRole('user')),
                SelectFilter::make('All Faculties')
                    ->relationship('faculty', 'faculty_name')->hidden(fn() => auth()->user()->hasRole('user')),
                SelectFilter::make('All Departments')
                    ->relationship('department', 'department_name')->hidden(fn() => auth()->user()->hasRole('user')),
                    SelectFilter::make('All Complain Categories')

                    ->relationship('complaincategoryname', 'complain_category_name')->hidden(fn() => auth()->user()->hasRole('user')),

                SelectFilter::make('status')

                ->options([

                    'inprocess' => 'In Process',
                    'repaired' => 'Repaired',
                    'deleivered' => 'Deleivered',
                    'send_to_vendor' => 'Send To Vendor'

                ])->hidden(fn() => auth()->user()->hasRole('user'))

            ])

            ->actions([

                Tables\Actions\EditAction::make('Action'),
                Tables\Actions\DeleteAction::make('Delete'),
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\Action::make('print')
                // ->action(function(User $record){
                //     $record ->id = $record->name;
                //     $record->save();
                // }),
                // CreateAction::make()
                //     ->successNotificationTitle('Your query Has been Submitted Successfully')
            ])
            ->bulkActions([

                Tables\Actions\DeleteBulkAction::make()->hidden(fn() => auth()->user()->hasRole('user')),

                FilamentExportBulkAction::make('export')
                    ->defaultPageOrientation('landscape')
                    ->csvDelimiter(',') // Delimiter for csv files
                    ->modifyExcelWriter(fn (SimpleExcelWriter $writer) => $writer->nameCurrentSheet('Sheet'))->hidden(fn() => auth()->user()->hasRole('user')), // Modify SimpleExcelWriter before download
                 // ->modifyPdfWriter(fn (PdfWrapper $writer) => $writer->setPaper('a4', 'landscape'))
            ]);
    }
            //     public static function getTableQuery()
            // {
            //     return static::nameModel()::query()->where('role', '1');
            // }

    public static function getRelations(): array
    {
        return [
            VendorRelationManager::class,
        ];
    }

    public static function getPages(): array
    {


        return [
            'index' => Pages\ListQueries::route('/'),
            'create' => Pages\CreateQuery::route('/create'),
            'edit' => Pages\EditQuery::route('/{record}/edit'),
        ];


    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['complainer_name','status', 'faculty.faculty_name','department.department_name','extension','vendor.company_name','complaincategoryname.complain_category_name','complaincategorytype.complain_category_type'];
    }
//     public static function getGlobalSearchResultActions(Model $record): array
// {
//     return [
//         Action::make('edit')
//             ->iconButton()
//             ->icon('heroicon-s-pencil')
//             ->url(static::getUrl('edit', ['record' => $record])),
//     ];
// }
                //     protected function getTableRecordActionUsing(): ?Closure
                // {
                //     return fn (): Action => DeleteAction::make();
                // }
                    // public static function getEloquentQuery(): Builder   OK HAE
                    // {
                    //     return static::getModel()::query()->where('status', );
                    // }
                //     protected function getTableRecordActionUsing(): ?Closure
                // {
                //     return null;
                // }



                //  public static function canDelete(Model $user):bool


                // {

                //     return $user->roles->hasRole==1;
                // }


                // public static function canCreate(): bool
                // {

                //     return false;
                // }
                // public static function canEdit(Model $user): bool
                // {


                //     return true;
                //  }



    public static function getNavigationBadge(): ?string
    {
        /*dd(self::getModel()::where('user_id', auth()->user()->id)->count());*/
        $user = auth()->user();
        $roles = $user->roles;
        foreach ($roles as $role)
        {
             $roleName = $role->name;

                if ($roleName === "admin" || $roleName === "super-admin")
                {
                    return self::getModel()::count();
                } else {
                    return self::getModel()::where('user_id', auth()->user()->id)->count();
                }

        }

    }




        //     protected function getTableFiltersLayout(): ?string
        // {
        //     return Layout::BelowContent;
        // }
            // public static function canDeleteAny(): bool // disable delete even delete in bulk actions
            // {
            //     return false;
            // }

            // public static function getEloquentQuery(): Builder
            // {
            //     return parent::getEloquentQuery()
            //         ->withoutGlobalScopes([
            //             SoftDeletingScope::class,
            //         ]);
            // }
}

