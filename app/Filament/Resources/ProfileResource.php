<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Profile;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Ysfkaya\FilamentPhoneInput\PhoneInput;
use App\Filament\Resources\ProfileResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfileResource\RelationManagers;


class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud';

    protected static ?string $navigationLabel = 'Personnelles';

    protected static ?string $navigationGroup = 'Informations';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Profil';


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Wizard::make([
                //     Wizard\Step::make('Utilisateur')
                //         ->description('Choix utilisateur')
                //         ->icon('heroicon-o-user')
                //         ->schema([
                //             Forms\Components\Select::make('user_id')
                //                 ->relationship('user', 'name')
                //                 ->required()
                //                 ->label('Utilisateur'),
                //         ]),
                //     Wizard\Step::make('Informations Personnelles')
                //         ->description('Informations Personnelles')
                //         ->icon('heroicon-o-identification')
                //         ->schema([
                //             Forms\Components\TextInput::make('firstname')
                //                 ->required()
                //                 ->maxLength(255)
                //                 ->label('Nom de Famille')
                //                 ->placeholder('Quiroule'),

                //             Forms\Components\TextInput::make('name')
                //                 ->required()
                //                 ->maxLength(255)
                //                 ->label('Prénom')
                //                 ->placeholder('Pierre'),

                //             Forms\Components\MarkdownEditor::make('biography')
                //                 ->required()
                //                 ->maxLength(65535)
                //                 ->label('Biographie')
                //                 ->placeholder("J'ai x age, mes loisirs sont exemple, autre exemple, encore un autre exemple. "),
                //         ]),
                //     Wizard\Step::make('Contact')
                //         ->description('Renseignement afin de te contacter')
                //         ->icon('heroicon-o-phone')
                //         ->schema([
                //             Forms\Components\TextInput::make('phone')
                //                 ->tel()
                //                 ->required()
                //                 ->maxLength(255)
                //                 ->label('Numéro de Téléphone')
                //                 ->placeholder('0# ## ## ## ##'),

                //             Forms\Components\TextInput::make('email')
                //                 ->email()
                //                 ->required()
                //                 ->maxLength(255)
                //                 ->label('Adresse Email')
                //                 ->placeholder('mail@exemple.com'),
                //         ]),
                // ])
                // Section::make('Utilisateur')
                //     ->description('Veuillez choisir votre utilisateur')
                //     ->schema([
                //         Forms\Components\TextInput::make('user_id')
                //             ->default(Auth::id())
                //     ]),
                Section::make('Personnelles')
                    ->description('Informations Personnelles')
                    ->schema([
                        Forms\Components\TextInput::make('firstname')
                            ->required()
                            ->maxLength(255)
                            ->label('Nom de Famille')
                            ->placeholder('Quiroule'),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Prénom')
                            ->placeholder('Pierre'),

                        Forms\Components\Textarea::make('biography')
                            ->required()
                            ->maxLength(65535)
                            ->label('Biographie')
                            ->placeholder("J'ai x age, mes loisirs sont exemple, autre exemple, encore un autre exemple. "),
                        Hidden::make('user_id')->default(Auth::id())
                    ]),
                Section::make('Contact')
                    ->description('Renseignement afin de te contacter')
                    ->schema([
                        PhoneInput::make('phone')
                            ->label('Numéro de Téléphone')
                            ->disallowDropdown()
                            ->initialCountry('fr'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->label('Adresse Email')
                            ->placeholder('mail@exemple.com'),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname')
                    ->sortable()
                    ->label(__('Nom de Famille')),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->label('Prénom'),
                Tables\Columns\TextColumn::make('biography')
                    ->sortable()
                    ->label('Biographie'),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->label('Numéro de Téléphone'),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->label('Adresse Email'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
