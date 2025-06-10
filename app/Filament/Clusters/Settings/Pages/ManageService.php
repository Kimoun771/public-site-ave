<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\ServiceSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageService extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-s-shield-check';

    protected static string $settings = ServiceSetting::class;

    protected static ?string $cluster = Settings::class;
    protected static ?int $navigationSort = 2;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero Section')
                    ->schema([
                        TranslatableContainer::make(
                            TextInput::make('hero.title')
                                ->label('Hero Title')
                                ->required()
                                ->maxLength(255)
                        )
                            ->label('Hero Title')
                            ->columnSpanFull()
                            ->requiredLocales(['en', 'km']),

                        TranslatableContainer::make(
                            Textarea::make('hero.description')
                                ->label('Hero Description')
                                ->required()
                                ->maxLength(1000)
                                ->rows(5)
                        )
                            ->label('Hero Description')
                            ->columnSpanFull()
                            ->requiredLocales(['en', 'km']),

                        FileUpload::make('hero.image')
                            ->image()
                            ->disk('public')
                            ->imagePreviewHeight(250)
                            ->previewable(true)
                            ->downloadable()
                            ->imageEditor()
                            ->loadingIndicatorPosition('left')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth(1200)
                            ->imageResizeTargetHeight(630)
                            ->visibility('public')
                            ->columnSpanFull()
                    ]),
                Section::make('Service Section')
                    ->schema([
                        Repeater::make('services')
                            ->schema([
                                TranslatableContainer::make(
                                    TextInput::make('name')
                                        ->label('Name')
                                        ->required()
                                        ->maxLength(255)
                                )
                                    ->label('Name')
                                    ->columnSpanFull()
                                    ->requiredLocales(['en', 'km']),
                                TranslatableContainer::make(
                                    Textarea::make('description')
                                        ->required()
                                        ->maxLength(1000)
                                        ->rows(5)
                                )
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->requiredLocales(['en', 'km']),
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->imagePreviewHeight(250)
                                    ->previewable(true)
                                    ->downloadable()
                                    ->imageEditor()
                                    ->loadingIndicatorPosition('left')
                                    ->removeUploadedFileButtonPosition('right')
                                    ->uploadProgressIndicatorPosition('left')
                                    ->imageResizeMode('contain')
                                    ->imageResizeTargetWidth(1200)
                                    ->imageResizeTargetHeight(630)
                                    ->visibility('public')
                                    ->columnSpanFull()
                            ])
                            ->columns(2)
                            ->itemLabel(fn(array $state): ?string => $state['name']['en'] ?? 'New Service')
                            ->defaultItems(0)
                            ->addActionLabel('Add New Service')
                            ->reorderable()
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 1,
                        'lg' => 1,
                    ])
            ]);
    }
}
