<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\ContactSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\FileUpload;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageContact extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    protected static string $settings = ContactSettings::class;

    protected static ?string $cluster = Settings::class;

    protected static ?string $title = 'Contact Settings';

    protected static ?string $navigationLabel = 'Manage Contact';

    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getHeroSection(),
            $this->getContactInfoSection(),
        ]);
    }

    private function getHeroSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Hero Section')
            ->schema([
                $this->getImageUploadField('hero_image', 'Slide Image'),
                $this->getTranslatableTextInput('title', 'Title'),
                $this->getTranslatableTextarea('description', 'Description', 5),
            ])
            ->columns(1);
    }

    private function getContactInfoSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Contact Information')
            ->schema([
                Forms\Components\Repeater::make('contact_info')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            $this->getTranslatableTextInput(
                                'name',
                                'Location Name'
                            ),
                            Forms\Components\TextInput::make('phone')
                                ->label('Phone')
                                ->tel()
                                ->maxLength(255),
                        ]),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('map_url')
                                ->label('Map URL')
                                ->url()
                                ->maxLength(500),
                        ]),

                        $this->getTranslatableTextarea('address', 'Address', 3),
                        $this->getTranslatableTextInput(
                            'working_hour',
                            'Working Hours'
                        ),
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(10)
                    ->columns(1)
                    ->columnSpanFull()
                    ->deletable(false)
                    ->reorderable(false)
                    ->addActionLabel('Add Location')
            ])
            ->columns(1);
    }

    private function getImageUploadField(
        string $name,
        string $label
    ): FileUpload {
        return FileUpload::make($name)
            ->label($label)
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
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(2048) // 2MB max
            ->columnSpanFull()
            ->helperText('Recommended size: 1200x630px. Max file size: 2MB.');
    }
    private function getTranslatableTextInput(
        string $name,
        string $label
    ): TranslatableContainer {
        return TranslatableContainer::make(
            Forms\Components\TextInput::make($name)
                ->label($label)
                ->required()
                ->maxLength(255)
        )
            ->columnSpanFull()
            ->requiredLocales(['en', 'km']);
    }

    private function getTranslatableTextarea(
        string $name,
        string $label,
        int $rows = 3
    ): TranslatableContainer {
        return TranslatableContainer::make(
            Forms\Components\Textarea::make($name)
                ->label($label)
                ->required()
                ->maxLength(1000)
                ->rows($rows)
        )
            ->columnSpanFull()
            ->requiredLocales(['en', 'km']);
    }
}
