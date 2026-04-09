<?php

namespace App\Filament\Resources\StudyClubs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class StudyClubForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Informasi Utama')
                            ->icon(Heroicon::InformationCircle)
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),
                                Select::make('coach_id')
                                    ->relationship('coach', 'name')
                                    ->label('Coach / Guru')
                                    ->required(),
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->maxLength(255),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                                FileUpload::make('banner_image')
                                    ->image()
                                    ->directory('study-club-banners')
                                    ->columnSpanFull()
                                    ->disk('public'),
                                RichEditor::make('description')
                                    ->columnSpanFull(),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->required(),
                            ])->columns(2),
                        // TAB 2: PROFIL DETAIL (Visi, Misi, Sejarah)
                        Tab::make('Profil & Detail')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                RichEditor::make('about')
                                    ->label('Tentang Club (Sejarah / Profil)')
                                    ->columnSpanFull(),
                                RichEditor::make('vision')
                                    ->label('Visi')
                                    ->columnSpanFull(),
                                RichEditor::make('mission')
                                    ->label('Misi')
                                    ->columnSpanFull(),
                            ]),

                        // TAB 3: TAUTAN & APLIKASI
                        Tab::make('Tautan Eksternal')
                            ->icon('heroicon-o-link')
                            ->schema([
                                KeyValue::make('social_links')
                                    ->label('Tautan Aplikasi / Sosmed')
                                    ->keyLabel('Platform (Contoh: Instagram, GDrive, Form)')
                                    ->valueLabel('URL / Link Target')
                                    ->addActionLabel('Tambah Tautan')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull() // Agar tabs memenuhi lebar layar
            ]);
    }
}
