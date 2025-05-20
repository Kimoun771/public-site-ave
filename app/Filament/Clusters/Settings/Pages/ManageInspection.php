<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\InspectionSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\FileUpload;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageInspection extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = InspectionSettings::class;

    protected static ?string $cluster = Settings::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Inspection Hero')
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

            Forms\Components\Section::make('Assurance and Compliance')->schema([
                TranslatableContainer::make(
                    Forms\Components\TextInput::make(
                        'assurance_and_compliance_title'
                    )
                        ->label('Title')
                        ->required()
                )
                    ->columnSpanFull()
                    ->requiredLocales(['en', 'km']),
                TranslatableContainer::make(
                    Forms\Components\Textarea::make(
                        'assurance_and_compliance_description'
                    )
                        ->label('Description')
                        ->required()
                )
                    ->columnSpanFull()
                    ->requiredLocales(['en', 'km']),
                Forms\Components\Repeater::make(
                    'assurance_and_compliance_image_des'
                )
                    ->label('Assurance Images & Descriptions')
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
