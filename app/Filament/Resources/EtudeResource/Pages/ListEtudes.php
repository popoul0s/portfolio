<?php

namespace App\Filament\Resources\EtudeResource\Pages;

use App\Filament\Resources\EtudeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEtudes extends ListRecords
{
    protected static string $resource = EtudeResource::class;

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
