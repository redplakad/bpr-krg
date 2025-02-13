<?php

namespace App\Filament\Resources\SurveyResource\Pages;

use App\Models\User;
use App\Filament\Resources\SurveyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSurvey extends CreateRecord
{
    protected static string $resource = SurveyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['cab'] = auth()->user()->branch_code;
        return $data;
    }
}
