<?php

namespace App\Filament\Resources\EtudeResource\Pages;

use App\Filament\Resources\EtudeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEtude extends EditRecord
{
    protected static string $resource = EtudeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
