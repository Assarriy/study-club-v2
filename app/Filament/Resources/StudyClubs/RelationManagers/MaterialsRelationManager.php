<?php

namespace App\Filament\Resources\StudyClubs\RelationManagers;

use Filament\Actions\Action;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MaterialsRelationManager extends RelationManager
{
    protected static string $relationship = 'materials';
    protected static ?string $title = 'Bank Materi & Modul';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Materi / Modul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('file_path')
                    ->label('Upload File (PDF, DOCX, PPTX)')
                    ->directory('materials')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/zip'])
                    ->maxSize(10240) // Maksimal 10MB
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Materi')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Diunggah Pada')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Materi Baru'),
                // AssociateAction::make(),
            ])
            ->recordActions([
                Action::make('download')
                    ->label('Unduh')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
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
