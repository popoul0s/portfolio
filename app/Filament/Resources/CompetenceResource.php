<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Competence;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Yepsua\Filament\Forms\Components\Rating;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompetenceResource\Pages;
use App\Filament\Resources\CompetenceResource\RelationManagers;

class CompetenceResource extends Resource
{
    protected static ?string $model = Competence::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    protected static ?string $navigationLabel = 'Compétences';

    protected static ?string $navigationGroup = 'Experiences';

    protected static ?string $modelLabel = 'Compétence';

    protected static ?int $navigationSort = 3;
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personnalisation')
                    ->description('Renseignement Important')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Nom de la compétence')
                            ->placeholder('Python ...'),
                        Rating::make('lvl')
                            ->min(0)
                            ->max(5)
                            ->effects(false)
                            ->options([
                                'Nul à Chier',
                                'Moyen',
                                'Bien',
                                'Très Bien',
                                'Excellent',
                            ])
                            ->label('Niveau de Maitrise ( 5 Niveaux differents )')
                            ->required(),
                        FileUpload::make('logo')
                            ->label('Logo ( format SVG recommandé )')
                            ->required()
                            ->image()
                            ->disk('languages')
                            ->preserveFilenames()
                            ->imageResizeTargetHeight('150'),
                        Hidden::make('user_id')->default(Auth::id())


                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Nom du Langage')->sortable(),
                ImageColumn::make('logo')
                    ->disk('languages')
                    ->circular()
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('lvl')
                ->label('Niveau de maitrise')
                ->icon('heroicon-s-star')->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Créé le')->sortable(),
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
            'index' => Pages\ListCompetences::route('/'),
            'create' => Pages\CreateCompetence::route('/create'),
            'edit' => Pages\EditCompetence::route('/{record}/edit'),
        ];
    }
}
