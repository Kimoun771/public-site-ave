<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Networking extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-share';
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
