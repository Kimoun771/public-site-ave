<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\HomeSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\FileUpload;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageHome extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $title = 'Manage Home';

    protected static string $settings = HomeSettings::class;

    protected static ?string $cluster = Settings::class;

    protected static ?int $navigationSort = 1;

    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getHomeSlideSection(),
            $this->getVeCertSection(),
            $this->getVeCertImageDescriptionSection(),
            $this->getOurClientSection(),
        ]);
    }

    private function getHomeSlideSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Home Slide')->schema([
            Forms\Components\Repeater::make('slide_image_des')
                ->label('Slide Images')
                ->schema([
                    $this->getImageUploadField('image', 'Slide Image'),
                    $this->getTranslatableTextInput('title', 'Slide Title'),
                    $this->getTranslatableTextarea(
                        'description',
                        'Slide Description'
                    ),
                ])
                ->defaultItems(1)
                ->columns(1)
                ->columnSpanFull()
                ->deletable(false)
                ->reorderable(false),
        ]);
    }

    private function getVeCertSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('AVE Certification')
            ->schema([
                Forms\Components\Repeater::make('vecert')
                    ->schema([
                        $this->getImageUploadField('image', 'AVE Image'),
                        $this->getTranslatableTextInput(
                            'title',
                            'AVE Title'
                        ),
                        $this->getTranslatableTextarea(
                            'description',
                            'AVE Description'
                        ),
                        $this->getTranslatableTextInput('slug', 'AVE Slug'),
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(10)
                    ->columns(1)
                    ->columnSpanFull()
                    ->deletable(false)
                    ->reorderable(false),
            ])
            ->columns(1);
    }

    private function getVeCertImageDescriptionSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('AVE Certification Details')
            ->icon('heroicon-o-document-text')
            ->schema([
                Forms\Components\Repeater::make('vecert_image_des')
                    ->label('AVE Certification Detail Items')
                    ->schema([
                        $this->getImageUploadField(
                            'image',
                            'AVE Detail Image'
                        ),
                        $this->getTranslatableTextInput(
                            'title',
                            'Detail Title'
                        ),
                        $this->getTranslatableTextarea(
                            'description',
                            'Detail Description'
                        ),
                    ])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(10)
                    ->columns(1)
                    ->columnSpanFull()
                    ->deletable(false)
                    ->reorderable(false),
            ])
            ->columns(1);
    }

    private function getOurClientSection(): Forms\Components\Section
    {
        return Forms\Components\Section::make('Our Clients')
            ->icon('heroicon-o-users')
            ->schema([
                $this->getTranslatableTextInput(
                    'our_client_image_des.title',
                    'Client Section Title'
                ),
                $this->getTranslatableTextarea(
                    'our_client_image_des.description',
                    'Client Section Description'
                ),
                FileUpload::make('our_client_image_des.images')
                    ->label('Client Logos')
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->imagePreviewHeight(150)
                    ->previewable(true)
                    ->downloadable()
                    ->imageEditor()
                    ->loadingIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadProgressIndicatorPosition('left')
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth(400)
                    ->imageResizeTargetHeight(200)
                    ->visibility('public')
                    ->maxFiles(20)
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/svg+xml',
                    ])
                    ->columnSpanFull()
                    ->helperText(
                        'Upload client logos. Recommended size: 400x200px. Max 20 files.'
                    ),
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
        string $label
    ): TranslatableContainer {
        return TranslatableContainer::make(
            Forms\Components\Textarea::make($name)
                ->label($label)
                ->required()
                ->maxLength(1000)
                ->rows(3)
        )
            ->columnSpanFull()
            ->requiredLocales(['en', 'km']);
    }
}
