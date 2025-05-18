<?php
namespace App\Filament\Resources;

use App\Models\Scheme;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use App\Filament\Resources\SchemeResource\Pages;


class SchemeResource extends Resource
{
    protected static ?string $model = Scheme::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.master_data');
    }

    public static function getNavigationLabel(): string
    {
        return __('company.scheme');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label(__('company.name_scheme'))
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->label(__('company.description_scheme'))
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('company.name_scheme'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label(__('company.description_scheme'))
                    ->limit(50)
                    ->wrap()
                    ->formatStateUsing(fn ($state) => $state ?: 'N/A')
                    ->placeholder('N/A'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('M d Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchemes::route('/'),
            'create' => Pages\CreateScheme::route('/create'),
            'edit' => Pages\EditScheme::route('/{record}/edit'),
        ];
    }
}
