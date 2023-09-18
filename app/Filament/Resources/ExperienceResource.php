<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Competence;
use App\Models\Experience;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExperienceResource\Pages;
use Icetalker\FilamentStepper\Forms\Components\Stepper;
use Illuminate\Database\Eloquent\Factories\Relationship;
use App\Filament\Resources\ExperienceResource\RelationManagers;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Expériences';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
    protected static ?string $navigationGroup = 'Experiences';

    protected static ?int $navigationSort = 5;

    protected static ?string $modelLabel = 'Experience';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Liaison')
                    ->description('Veuillez choisir vos liaisons')
                    ->schema([
                        Forms\Components\Select::make('etude_id')
                            ->relationship('etude', 'name')
                            ->required()
                            ->label('Formation en cours'),
                        Forms\Components\Select::make('company_id')
                            ->relationship('company', 'name')
                            ->required()
                            ->label('Entreprise'),
                        Forms\Components\Select::make('competences')
                            ->multiple()
                            ->options(function (Competence $competence) {
                                return Competence::all()->pluck('title', 'title');
                            }),
                            Hidden::make('user_id')->default(Auth::id())
                    ]),
                Section::make('Description')
                    ->description('Veuillez décrire le déroulement de cette expérience')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Titre')
                            ->placeholder('Exemple: Stage Ikea'),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(65535),
                        Stepper::make('sort')
                            ->label('Emplacement')
                            ->minValue(1)
                            ->maxValue(Experience::all()->count()+1)
                            ->default(1),
                    ]), Section::make('Date')
                    ->description('Veuillez choisir vos dates')
                    ->schema([
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
                            ->label("Date de fin ( seulement si l'experience est terminé")
                            ->requiredWith('current')
                            ->hidden(
                                fn (Closure $get): bool => $get('current') == true
                            ),
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('etude.name')
                ->label('Formation en cours')
                ->sortable(),
                Tables\Columns\TextColumn::make('company.name')->label('Entreprise')->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')->sortable(),
                Tables\Columns\TextColumn::make('description')->sortable(), 
                Tables\Columns\TextColumn::make('competences')->sortable(),
                Tables\Columns\IconColumn::make('current')
                ->label('En cours')    
                ->boolean()->sortable(),
                Tables\Columns\TextColumn::make('started_at')
                    ->date()
                    ->label('Commencé le')->sortable(),
                Tables\Columns\TextColumn::make('finished_at')
                ->label('Fini le')    
                ->date()->sortable(),
                Tables\Columns\TextColumn::make('sort')
                ->label('Classement')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),            ])
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
