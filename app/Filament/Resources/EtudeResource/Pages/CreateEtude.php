<?php

namespace App\Filament\Resources\EtudeResource\Pages;

use App\Filament\Resources\EtudeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEtude extends CreateRecord
{
    protected static string $resource = EtudeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
