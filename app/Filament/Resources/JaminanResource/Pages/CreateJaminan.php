<?php

namespace App\Filament\Resources\JaminanResource\Pages;

use App\Filament\Resources\JaminanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJaminan extends CreateRecord
{
    protected static string $resource = JaminanResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['cab'] = auth()->user()->branch_code;
        return $data;
    }
}
