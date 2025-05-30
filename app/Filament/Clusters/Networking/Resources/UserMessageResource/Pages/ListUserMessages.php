<?php

namespace App\Filament\Clusters\Networking\Resources\UserMessageResource\Pages;

use App\Filament\Clusters\Networking\Resources\UserMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserMessages extends ListRecords
{
    protected static string $resource = UserMessageResource::class;
}
