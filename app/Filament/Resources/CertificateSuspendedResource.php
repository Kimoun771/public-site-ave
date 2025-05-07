<?php

namespace App\Filament\Resources;

use App\Models\Certificate;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteAction;

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
        return __('certificate_suspended.plural');// Make it plural for better clarity
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
                    ->label(__('certificate_suspended.registration_date'))
                    ->date(),

                TextColumn::make('expire_date')
                    ->label(__('certificate_suspended.expire_date'))
                    ->date(),

                TextColumn::make('status')
                    ->label(__('certificate_suspended.status'))
                    ->badge()
                    ->color(fn ($record) => match ($record->status) {
                        'Suspend' => 'danger',
                        'Expired' => 'warning',
                        'Valid' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('is_suspended', true); // Only fetch suspended certificates
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
