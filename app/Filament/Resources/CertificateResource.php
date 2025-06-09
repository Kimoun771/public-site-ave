<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Forms\Get;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.master_data');
    }
    public static function getNavigationLabel(): string
    {
        return __('certificate.certificate');
    }
    public static function getPluralModelLabel(): string
    {
        return __('certificate.plural');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('certificate.certificate_information'))
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('certificate_number')
                                ->label(__('certificate.number'))
                                ->required()
                                ->unique(ignoreRecord: true),

                            Select::make('company_id')
                                ->label(__('certificate.company'))
                                ->relationship('company', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->getOptionLabelFromRecordUsing(fn ($record) =>
                                "{$record->name} ({$record->country?->name})\n{$record->scope?->name}\n{$record->scheme?->name}"
                                )
                                ->getOptionLabelUsing(fn ($value): ?string =>
                                \App\Models\Company::find($value)?->name
                                )
                                ->reactive()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->label(__('certificate.company_name'))
                                        ->required()
                                        ->maxLength(255),
                                    Select::make('scheme_id')
                                        ->label(__('certificate.scheme'))
                                        ->relationship('scheme', 'name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->createOptionForm([
                                            TextInput::make('name')->label(__('company.name_scheme'))->required(),
                                            Textarea::make('description')->label(__('company.description_scheme')),
                                        ])
                                        ->createOptionAction(function (\Filament\Forms\Components\Actions\Action $action) {
                                            return $action->label(__('company.add_new_scheme'));
                                        }),

                                    Select::make('scope_id')
                                        ->label(__('certificate.scope'))
                                        ->relationship('scope', 'name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->createOptionForm([
                                            TextInput::make('name')->label(__('company.name_scope'))->required(),
                                            Textarea::make('description')->label(__('company.description_scope')),
                                        ])
                                        ->createOptionAction(function(\Filament\Forms\Components\Actions\Action $action) {
                                            return $action->label(__('company.add_new_scope'));
                                        }),
                                    Textarea::make('address')
                                        ->label(__('certificate.address')),
                                    Select::make('country_id')
                                        ->label(__('certificate.country'))
                                        ->relationship('country', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                ])
                                ->createOptionAction(fn (\Filament\Forms\Components\Actions\Action $action) =>
                                $action->label(__('certificate.add_company'))
                                ),
                        ]),
                        Grid::make(2)->schema([
                            DatePicker::make('registration_date')
                                ->label(__('certificate.registration_date'))
                                ->reactive()
                                ->required()
                                ->afterStateUpdated(function (Get $get, Set $set) {
                                    if (filled($get('registration_date'))) {
                                        $set('expire_date', null);
                                    }
                                })
                                ->hidden(fn (Get $get) => filled($get('expire_date')))
                                ->dehydrated(fn (Get $get) => blank($get('expire_date'))),

                            DatePicker::make('expire_date')
                                ->label(__('certificate.expire_date'))
                                ->reactive()
                                ->required()
                                ->afterStateUpdated(function (Get $get, Set $set) {
                                    if (filled($get('expire_date'))) {
                                        $set('registration_date', null);
                                    }
                                })
                                ->hidden(fn (Get $get) => filled($get('registration_date')))
                                ->dehydrated(fn (Get $get) => blank($get('registration_date'))),
                        ]),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_number')
                    ->label(__('certificate.number'))
                    ->sortable()
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Copied to clipboard!')
                    ->copyMessageDuration(1500),

                TextColumn::make('company.name')
                    ->label(__('certificate.company'))
                    ->limit(50)
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('company.country.name')
                    ->label(__('company.country'))
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

                TextColumn::make('company.scope.name')
                    ->label(__('certificate.scope'))
                    ->sortable()
                    ->limit(50)
                    ->wrap()
                    ->searchable(),

                TextColumn::make('status')
                    ->label(__('certificate.status'))
                    ->state(function ($record) {
                        return $record->expire_date && $record->expire_date <= now()
                            ? 'Suspend'
                            : 'Valid';
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Suspend' => 'danger',
                        'Valid' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('certificate.status'))
                    ->options([
                        'Valid'     => __('certificate.valid'),
                        'Suspend'   => __('certificate.suspended'),
                    ])
                    ->default(fn () => request()->query('status'))
                    ->query(function (Builder $query, array $data) {
                        if (($data['value'] ?? null) === 'Valid') {
                            $query->whereDate('expire_date', '>', now());
                        } elseif (($data['value'] ?? null) === 'Suspend') {
                            $query->whereDate('expire_date', '<=', now());
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
