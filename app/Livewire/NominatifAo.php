<?php
 
namespace App\Livewire;
 
use App\Models\MisLoan;
use App\Models\Setting;
use App\Models\User;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
 
class NominatifAo extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;

        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
            )
            ->columns([
                TextColumn::make('NAMA_NASABAH')
                            ->label('NAMA NASABAH'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }
    
    public function render(): View
    {
        return view('livewire.nominatif-ao');
    }
}