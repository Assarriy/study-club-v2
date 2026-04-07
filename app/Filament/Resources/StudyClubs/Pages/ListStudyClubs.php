<?php

namespace App\Filament\Resources\StudyClubs\Pages;

use App\Filament\Resources\StudyClubs\StudyClubResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudyClubs extends ListRecords
{
    protected static string $resource = StudyClubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
