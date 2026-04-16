<?php

namespace App\Filament\Resources\StudyClubs\Pages;

use App\Filament\Resources\StudyClubs\StudyClubResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudyClub extends EditRecord
{
    protected static string $resource = StudyClubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
