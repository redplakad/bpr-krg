<?php

namespace App\Filament\Resources\KinerjaResource\Pages;

use App\Filament\Resources\KinerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKinerja extends CreateRecord
{
    protected static string $resource = KinerjaResource::class;
    protected static ?string $title = 'Input Rencana Kerja';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}