<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use App\Models\Setting;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class pencairanTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        $datadate = Setting::where('name','DATADATE')->first();
        $datadate = $datadate->value;
        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate)->get()
            )
            ->columns([
                // ...
            ]);
    }
}
