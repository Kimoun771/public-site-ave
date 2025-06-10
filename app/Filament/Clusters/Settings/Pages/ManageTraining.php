<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\TrainingSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\FileUpload;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageTraining extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static string $settings = TrainingSettings::class;

    protected static ?string $cluster = Settings::class;
    protected static ?int $navigationSort = 4;
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Training Hero')
                ->schema([
                    FileUpload::make('hero_image')
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
                        ->columnSpanFull(),
                    TranslatableContainer::make(
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                    )
                        ->columnSpanFull()
                        ->requiredLocales(['en', 'km']),
                    TranslatableContainer::make(
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required()
                    )
                        ->columnSpanFull()
                        ->requiredLocales(['en', 'km']),
                ])
                ->columns(1),

            Forms\Components\Section::make('Training Program')->schema([
                TranslatableContainer::make(
                    Forms\Components\TextInput::make('training_title')
                        ->label('Title')
                        ->required()
                )
                    ->columnSpanFull()
                    ->requiredLocales(['en', 'km']),
                Forms\Components\Repeater::make('training_program_image_des')
                    ->label('Training Program')
                    ->schema([
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
                            ->columnSpanFull(),
                        TranslatableContainer::make(
                            Forms\Components\TextInput::make('des')
                                ->label('Description')
                                ->required()
                        )->requiredLocales(['en', 'km']),
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->columns(1)
                    ->columnSpanFull(),
            ]),

            Forms\Components\Section::make('Consulting Services')->schema([
                TranslatableContainer::make(
                    Forms\Components\TextInput::make(
                        'consulting_services_title'
                    )
                        ->label('Title')
                        ->required()
                )
                    ->columnSpanFull()
                    ->requiredLocales(['en', 'km']),
                Forms\Components\Repeater::make('consulting_services_image_des')
                    ->label('Consulting Service')
                    ->schema([
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
                            ->columnSpanFull(),
                        TranslatableContainer::make(
                            Forms\Components\TextInput::make('des')
                                ->label('Description')
                                ->required()
                        )->requiredLocales(['en', 'km']),
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->columns(1)
                    ->columnSpanFull(),
            ]),
        ]);
    }
}
