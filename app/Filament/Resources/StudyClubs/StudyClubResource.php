<?php

namespace App\Filament\Resources\StudyClubs;

use App\Filament\Resources\StudyClubs\Pages\CreateStudyClub;
use App\Filament\Resources\StudyClubs\Pages\EditStudyClub;
use App\Filament\Resources\StudyClubs\Pages\ListStudyClubs;
use App\Filament\Resources\StudyClubs\RelationManagers\AchievementsRelationManager;
use App\Filament\Resources\StudyClubs\RelationManagers\MaterialsRelationManager;
use App\Filament\Resources\StudyClubs\RelationManagers\RegistrationsRelationManager;
use App\Filament\Resources\StudyClubs\RelationManagers\SchedulesRelationManager;
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
            StudentsRelationManager::class,
            AchievementsRelationManager::class,
            SchedulesRelationManager::class,
            MaterialsRelationManager::class,
            RegistrationsRelationManager::class,
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

        $user = auth()->user();

        // 1. Logika untuk Siswa: Hanya lihat club di mana dia terdaftar
        if ($user->hasRole('siswa')) {
            $query->whereHas('students', function (Builder $q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        // 2. Logika untuk Coach: Hanya lihat club yang dia ajar (Opsional, hapus kalau Coach boleh lihat semua)
        elseif ($user->hasRole('coach')) {
            $query->where('coach_id', $user->id);
        }

        // 3. Super Admin otomatis melihat semua data tanpa filter

        return $query;
    }
}