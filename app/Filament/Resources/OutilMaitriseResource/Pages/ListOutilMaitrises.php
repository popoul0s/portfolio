<?php

namespace App\Filament\Resources\OutilMaitriseResource\Pages;

use App\Filament\Resources\OutilMaitriseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutilMaitrises extends ListRecords
{
    protected static string $resource = OutilMaitriseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
