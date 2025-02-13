<?php

namespace App\Filament\Resources\PenagihanResource\Pages;

use App\Filament\Resources\PenagihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenagihan extends CreateRecord
{
    protected static string $resource = PenagihanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['cab'] = auth()->user()->branch_code;
        return $data;
    }
}
