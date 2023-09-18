<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Etude;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EtudeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EtudeResource\RelationManagers;

class EtudeResource extends Resource
{
    protected static ?string $model = Etude::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Scolarité';

    protected static ?string $navigationGroup = 'Informations';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Scolarité';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Nom de la formation')
                    ->description('Exemple : Baccaloréat, BTS...')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nom'),
                        Forms\Components\Textarea::make('description')
                                ->required()
                                ->maxLength(65535),
                        Forms\Components\DatePicker::make('started_at')
                            ->required()
                            ->label('Date de début'),
                        Forms\Components\Toggle::make('current')
                            ->required()
                            ->label('En Cours')
                            ->reactive()
                            ->requiredWith('end_date')
                            ->afterStateUpdated(
                                fn ($state, callable $set) => $state ? $set('end_date', null) : $set('end_date', 'hidden')
                            ),
                        Forms\Components\DatePicker::make('finished_at')
                            ->label("Date de fin")
                            ->requiredWith('current')
                            ->hidden(
                                fn (Closure $get): bool => $get('current') == true
                            ),
                    ]),
                Hidden::make('user_id')->default(Auth::id())

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de la formation')->sortable(),
                    Tables\Columns\IconColumn::make('current')
                    ->label('En cours')    
                    ->boolean()->sortable(),
                    Tables\Columns\TextColumn::make('started_at')
                        ->date()
                        ->label('Commencé le')->sortable(),
                    Tables\Columns\TextColumn::make('finished_at')
                    ->label('Fini le')    
                    ->date()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListEtudes::route('/'),
            'create' => Pages\CreateEtude::route('/create'),
            'edit' => Pages\EditEtude::route('/{record}/edit'),
        ];
    }
}
