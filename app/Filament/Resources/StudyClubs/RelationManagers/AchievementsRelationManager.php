<?php

namespace App\Filament\Resources\StudyClubs\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AchievementsRelationManager extends RelationManager
{
    protected static string $relationship = 'achievements';
    protected static ?string $title = 'Data Prestasi';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Lomba / Prestasi')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('year')
                    ->label('Tahun')
                    ->numeric()
                    ->required()
                    ->maxLength(4),
                TextInput::make('rank')
                    ->label('Peringkat / Juara')
                    ->placeholder('Contoh: Juara 1 Nasional')
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('Foto Bukti / Piala')
                    ->image()
                    ->directory('achievements')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Keterangan Tambahan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto'),
                TextColumn::make('title')
                    ->label('Nama Prestasi')
                    ->searchable(),
                TextColumn::make('rank')
                    ->label('Peringkat')
                    ->badge()
                    ->color('success'),
                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make() -> label('Tambah Prestasi'),
            ])
            ->recordActions([
                EditAction::make(),
                // DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
