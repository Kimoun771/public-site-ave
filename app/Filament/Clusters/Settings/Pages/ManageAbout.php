<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\AboutSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageAbout extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static string $settings = AboutSettings::class;
    protected static ?string $cluster = Settings::class;
    protected static ?string $title = 'About Settings';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Manage About';

    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getHeroSection(),
            $this->getContentSection(),
        ]);
    }

    private function getHeroSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Hero Section')
            ->schema([
                $this->getImageUploadField('hero_image', 'Hero Banner Image'),
                $this->getTranslatableTextInput('title', 'Page Title'),
                $this->getTranslatableTextarea(
                    'description',
                    'Page Description',
                    3
                ),
            ])
            ->columns(1);
    }

    private function getContentSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Content Sections')
            ->schema([
                $this->getTranslatableTextInput('name', 'Section Name'),
                Forms\Components\Repeater::make('image_des')
                    ->label('Image Descriptions')
                    ->schema([
                        $this->getImageUploadField('image', 'Section Image'),
                        $this->getTranslatableTextInput(
                            'title',
                            'Section Title'
                        ),
                        $this->getTranslatableTextarea(
                            'description',
                            'Section Description',
                            4
                        ),
                    ])
                    ->columns(1)
                    ->addActionLabel('Add Content Section')
                    ->defaultItems(0)
                    ->minItems(0)
                    ->maxItems(10)
                    ->deletable(false)
                    ->reorderable(false)
                    ->columnSpanFull(),
            ])
            ->columns(1)
            ->collapsible();
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
