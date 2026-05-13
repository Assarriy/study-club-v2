<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('study_club_id')
                    ->relationship('studyClub', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options([
                        'photo' => 'Foto',
                        'video' => 'Video (Youtube Link)',
                    ])
                    ->required()
                    ->live(),

                FileUpload::make('media_path')
                    ->label('File Foto')
                    ->image()
                    ->directory('galleries')
                    ->disk('public')
                    ->visible(fn(Get $get) => $get('type') === 'photo')
                    ->required(),

                TextInput::make('media_path')
                    ->label('Link Video YouTube')
                    ->placeholder('https://www.youtube.com/watch?v=...')
                    ->visible(fn(Get $get) => $get('type') === 'video')
                    ->live(debounce: 600)
                    ->required()
                    ->suffixIcon('heroicon-o-video-camera')
                    ->helperText(fn(Get $get): HtmlString|string => self::youtubePreview($get('media_path'))),

                Textarea::make('description')->columnSpanFull(),
            ]);
    }

    private static function youtubePreview(?string $url): HtmlString|string
    {
        if (!$url) {
            return '';
        }

        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $matches);
        $ytId = $matches[1] ?? null;

        if (!$ytId) {
            return new HtmlString(
                '<span class="text-amber-600 text-sm font-medium">⚠ URL YouTube tidak valid. Contoh: https://www.youtube.com/watch?v=xxxxx</span>'
            );
        }

        $thumb = "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
        $watchUrl = "https://www.youtube.com/watch?v={$ytId}";

        return new HtmlString(<<<HTML
            <div class="mt-2 rounded-xl overflow-hidden border border-green-200 bg-green-50 p-3 flex items-center gap-3">
                <img src="{$thumb}" alt="YouTube Thumbnail"
                     class="w-28 h-16 object-cover rounded-lg flex-shrink-0"
                     onerror="this.style.display='none'">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-1.5 mb-1">
                        <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        <span class="text-sm font-semibold text-green-700">Link YouTube tersimpan</span>
                    </div>
                    <a href="{$watchUrl}" target="_blank"
                       class="text-xs text-blue-600 underline truncate block hover:text-blue-800">
                        {$watchUrl}
                    </a>
                </div>
            </div>
        HTML);
    }
}
