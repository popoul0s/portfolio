<?php

namespace App\Filament\Resources\OutilMaitriseResource\Pages;

use App\Filament\Resources\OutilMaitriseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOutilMaitrise extends CreateRecord
{
    protected static string $resource = OutilMaitriseResource::class;

    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
