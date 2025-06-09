<?php
namespace App\Filament\Resources;

use App\Models\Scope;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use App\Filament\Resources\ScopeResource\Pages;


class ScopeResource extends Resource
{
    protected static ?string $model = Scope::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.master_data');
    }

    public static function getNavigationLabel(): string
    {
        return __('company.scope');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label(__('company.name_scope'))
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->label(__('company.description_scope'))
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('company.name_scope'))
                    ->sortable()
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('company.description_scope'))
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
            'index' => Pages\ListScopes::route('/'),
            'create' => Pages\CreateScope::route('/create'),
            'edit' => Pages\EditScope::route('/{record}/edit'),
        ];
    }
}
