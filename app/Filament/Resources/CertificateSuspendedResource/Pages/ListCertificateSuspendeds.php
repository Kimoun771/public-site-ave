<?php

namespace App\Filament\Resources\CertificateSuspendedResource\Pages;

use App\Filament\Resources\CertificateSuspendedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificateSuspendeds extends ListRecords
{
    protected static string $resource = CertificateSuspendedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
