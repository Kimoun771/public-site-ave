<?php

namespace App\Filament\Resources;
use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    public static function getNavigationGroup(): ?string
    {
        return __('navigation.master_data');
    }
    public static function getNavigationLabel(): string
    {
        return __('company.company');
    }
    public static function getPluralModelLabel(): string
    {
        return __('company.plural');// Make it plural for better clarity
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('company.company_information'))
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->label(__('company.company_name'))->required(),
                            TextInput::make('scheme')->label(__('company.scheme')),
                        ]),
                        Textarea::make('scope')->label(__('company.scope')),
                        Textarea::make('address')->label(__('company.address')),
                        Select::make('country_id')
                            ->label(__('company.country'))
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('company.company_name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('address')
                    ->label(__('company.address'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('country.name')
                    ->label(__('company.country'))
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
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
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
