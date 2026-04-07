<?php

namespace App\Filament\Resources\StudyClubs;

use App\Filament\Resources\StudyClubs\Pages\CreateStudyClub;
use App\Filament\Resources\StudyClubs\Pages\EditStudyClub;
use App\Filament\Resources\StudyClubs\Pages\ListStudyClubs;
use App\Filament\Resources\StudyClubs\RelationManagers\StudentsRelationManager;
use App\Filament\Resources\StudyClubs\Schemas\StudyClubForm;
use App\Filament\Resources\StudyClubs\Tables\StudyClubsTable;
use App\Models\StudyClub;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StudyClubResource extends Resource
{
    protected static ?string $model = StudyClub::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return StudyClubForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudyClubsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudyClubs::route('/'),
            'create' => CreateStudyClub::route('/create'),
            'edit' => EditStudyClub::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Cek apakah yang login adalah Coach (tapi bukan super_admin)
        if (auth()->user()->hasRole('coach') && !auth()->user()->hasRole('super_admin')) {
            // Jika ya, filter data hanya tampilkan yang coach_id nya sama dengan ID user yang sedang login
            return $query->where('coach_id', auth()->id());
        }

        // Jika super_admin, kembalikan semua data
        return $query;
    }
}
