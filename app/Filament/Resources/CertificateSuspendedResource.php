<?php

namespace App\Filament\Resources;

use App\Models\Certificate;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

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
                TextColumn::make('row_number')
                    ->label(__('certificate_suspended.row_number'))
                    ->state(static function ($record, $livewire) {
                        return ($livewire->getTableRecords()->search(fn ($r) => $r->getKey() === $record->getKey()) + 1);
                    })
                    ->sortable(false),
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
                    ->state(fn ($record) => $record->registration_date
                        ? \Carbon\Carbon::parse($record->registration_date)->format('M-d-Y')
                        : 'N/A')
                    ->toggleable(),

                TextColumn::make('expire_date')
                    ->label(__('certificate.expire_date'))
                    ->state(fn ($record) => $record->expire_date
                        ? \Carbon\Carbon::parse($record->expire_date)->format('M-d-Y')
                        : 'N/A')
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
            ->filters([])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Export to Excel')
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename('Certificate_Suspended'),
                    ])
            ]);
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
