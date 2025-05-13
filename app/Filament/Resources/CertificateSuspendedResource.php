<?php

namespace App\Filament\Resources;

use App\Models\Certificate;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;

class CertificateSuspendedResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-x-circle';

    public static function getNavigationGroup(): ?string
    {
        return __('certificate_suspended.report');
    }

    public static function getNavigationLabel(): string
    {
        return __('certificate_suspended.title');
    }

    public static function getPluralModelLabel(): string
    {
        return __('certificate_suspended.plural');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_number')
                    ->label(__('certificate_suspended.certificate_number'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('company.name')
                    ->label(__('certificate_suspended.company'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('registration_date')
                    ->label(__('certificate.registration_date'))
                    ->state(function ($record) {
                        return $record->registration_date
                            ? \Carbon\Carbon::parse($record->registration_date)->format('M-d-Y')
                            : 'N/A';
                    })
                    ->toggleable(),

                TextColumn::make('expire_date')
                    ->label(__('certificate.expire_date'))
                    ->state(function ($record) {
                        return $record->expire_date
                            ? \Carbon\Carbon::parse($record->expire_date)->format('M-d-Y')
                            : 'N/A';
                    })
                    ->toggleable(),

                TextColumn::make('status')
                    ->label(__('certificate_suspended.status'))
                    ->badge()
                    ->color(fn ($record) => match ($record->status) {
                        'Suspend' => 'danger',
                        'Valid' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereNotNull('expire_date')
            ->whereDate('expire_date', '<=', now());
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => CertificateSuspendedResource\Pages\ListCertificateSuspendeds::route('/'),
        ];
    }
}
