<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Settings\SeoSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ManageSeo extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'SEO Pages';

    protected static string $settings = SeoSettings::class;

    protected static ?string $cluster = Settings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Pages')
                    ->tabs([
                        Tabs\Tab::make('Home')
                            ->schema($this->getPageSchema('home')),
                        Tabs\Tab::make('Service')
                            ->schema($this->getPageSchema('service')),
                        Tabs\Tab::make('Inspection')
                            ->schema($this->getPageSchema('inspection')),
                        Tabs\Tab::make('Training')
                            ->schema($this->getPageSchema('training')),
                        Tabs\Tab::make('About')
                            ->schema($this->getPageSchema('about')),
                        Tabs\Tab::make('Contact')
                            ->schema($this->getPageSchema('contact')),
                    ])
                    ->columnSpanFull()
                    ->default('home')
            ]);
    }

    private function getPageUrl(string $pageKey): string
    {
        $urls = [
            'home' => '',  // Empty string for home page
            'service' => 'service',
            'inspection' => 'inspection',
            'training' => 'training',
            'about' => 'about',
            'contact' => 'contact',
        ];

        return $urls[$pageKey] ?? $pageKey; // Fallback without leading slash
    }

    private function getPageSchema(string $page): array
    {
        return [
            Section::make('SEO Settings')
                ->schema([
                    TranslatableContainer::make(
                        TextInput::make("pages.{$page}.url")
                        ->label('URL')
                        ->default($this->getPageUrl($page))
                        ->readOnly()
                        ->maxLength(255)
                        ->helperText('URL path without leading slash (empty for homepage)')
                        ->columnSpanFull(),
                    )
                        ->columnSpanFull(),
                    TranslatableContainer::make(
                        TextInput::make("pages.{$page}.meta_title")
                            ->label('Meta Title')
                            ->maxLength(60)
                            ->helperText('Recommended: 50-60 characters')
                    )
                        ->columnSpanFull(),

                    TranslatableContainer::make(
                        Textarea::make("pages.{$page}.meta_description")
                            ->label('Meta Description')
                            ->maxLength(160)
                            ->helperText('Recommended: 150-160 characters')
                    )
                        ->columnSpanFull(),

                    TranslatableContainer::make(
                        TextInput::make("pages.{$page}.meta_keywords")
                            ->label('Meta Keywords')
                            ->helperText('Comma-separated keywords')
                    )
                        ->columnSpanFull(),

                    TranslatableContainer::make(
                        TextInput::make("pages.{$page}.og_title")
                            ->label('OpenGraph Title')
                            ->maxLength(60)
                            ->helperText('Recommended: 50-60 characters')
                    )
                        ->columnSpanFull(),

                    TranslatableContainer::make(
                        Textarea::make("pages.{$page}.og_description")
                            ->label('OpenGraph Description')
                            ->maxLength(160)
                            ->helperText('Recommended: 150-160 characters')
                    )
                        ->columnSpanFull(),
                    FileUpload::make("pages.{$page}.og_image")
                        ->label('OpenGraph Image')
                        ->image()
                        ->disk('public')
                        ->directory('seo')
                        ->imagePreviewHeight(250)
                        ->imageResizeMode('contain')
                        ->imageResizeTargetWidth(1200)
                        ->imageResizeTargetHeight(630)
                        ->columnSpanFull(),
                ])
                ->columns(2)
        ];
    }
}