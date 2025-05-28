<?php

namespace App\Filament\Clusters\Networking\Resources\UserMessageResource\Pages;

use App\Filament\Clusters\Networking\Resources\UserMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserMessage extends EditRecord
{
    protected static string $resource = UserMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
