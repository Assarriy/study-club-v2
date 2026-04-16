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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegistrationsRelationManager extends RelationManager
{
    protected static string $relationship = 'registrations';
    protected static ?string $title = 'Antrean Pendaftar Baru';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('motivation')
                    ->label('Motivasi / Alasan Bergabung')
                    ->disabled() // Coach cuma bisa baca, gak boleh ngedit motivasi siswa
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Menunggu Review',
                        'approved' => 'Terima (Approved)',
                        'rejected' => 'Tolak (Rejected)',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user.name')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Siswa')
                    ->searchable(),
                TextColumn::make('user.email')
                    ->label('Email'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Review')
                    ->icon('heroicon-o-check-circle')
                    // Logic otomatis: Kalau Coach ubah status jadi "approved", siswa otomatis masuk ke tabel pivot study_club_user
                    ->after(function ($record) {
                        if ($record->status === 'approved') {
                            $record->studyClub->students()->syncWithoutDetaching([$record->user_id]);
                        } elseif ($record->status === 'rejected' || $record->status === 'pending') {
                            $record->studyClub->students()->detach($record->user_id);
                        }
                    }),
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
