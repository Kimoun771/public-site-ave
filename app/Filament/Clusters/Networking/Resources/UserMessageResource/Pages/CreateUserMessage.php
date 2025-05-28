<?php

namespace App\Filament\Clusters\Networking\Resources\UserMessageResource\Pages;

use App\Filament\Clusters\Networking\Resources\UserMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserMessage extends CreateRecord
{
    protected static string $resource = UserMessageResource::class;
}
