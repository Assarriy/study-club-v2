<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

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
                    ->required(),

                Textarea::make('description')->columnSpanFull(),
            ]);
    }
}
