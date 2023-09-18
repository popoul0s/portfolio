<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\OutilMaitrise;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OutilMaitriseResource\Pages;
use App\Filament\Resources\OutilMaitriseResource\RelationManagers;

class OutilMaitriseResource extends Resource
{
    protected static ?string $model = OutilMaitrise::class;
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Maitrise';

    protected static ?string $navigationGroup = 'Experiences';

    protected static ?int $navigationSort = 4;

    protected static ?string $modelLabel = 'Maitrise';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Utilisateur')
                    ->description('Veuillez choisir votre utilisateur')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Nom de la maitrise')
                            ->placeholder('Exemple: Laravel'),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(65535)
                            ->label('Description')
                            ->placeholder('À quoi ça sert ?'),
                            Hidden::make('user_id')->default(Auth::id())
                    ]),
                Section::make('Informations complémentaires')
                    ->description('informations necessaire pour un portfolio complet ')
                    ->schema([

                        Forms\Components\TextInput::make('lien_doc')
                            ->required()
                            ->maxLength(255)
                            ->label('Lien de la Documentation')
                            ->placeholder('https://doc.com'),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Nom de la maitrise')->sortable(),
                Tables\Columns\TextColumn::make('description')->sortable(),
                Tables\Columns\TextColumn::make('lien_doc')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Mis à jour le..')->sortable(),
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
            'index' => Pages\ListOutilMaitrises::route('/'),
            'create' => Pages\CreateOutilMaitrise::route('/create'),
            'edit' => Pages\EditOutilMaitrise::route('/{record}/edit'),
        ];
    }
}
