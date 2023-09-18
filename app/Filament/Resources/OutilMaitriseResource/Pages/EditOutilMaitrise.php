<?php

namespace App\Filament\Resources\OutilMaitriseResource\Pages;

use App\Filament\Resources\OutilMaitriseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOutilMaitrise extends EditRecord
{
    protected static string $resource = OutilMaitriseResource::class;

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
