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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'schedules';
    protected static ?string $title = 'Jadwal Kegiatan';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Kegiatan')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                DateTimePicker::make('schedule_time')
                    ->label('Waktu Pelaksanaan')
                    ->required(),
                Select::make('type')
                    ->label('Jenis Kegiatan')
                    ->options([
                        'rutin' => 'Latihan Rutin',
                        'lomba' => 'Persiapan Lomba',
                        'event' => 'Acara / Event Khusus',
                    ])
                    ->default('rutin')
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->placeholder('Contoh: Ruang Kelas 11 / Lab Komputer')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Keterangan Tambahan')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->label('Kegiatan')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'rutin' => 'info',
                        'lomba' => 'danger',
                        'event' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('schedule_time')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('location')
                    ->label('Lokasi'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Jadwal'),
                // AssociateAction::make(),
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
