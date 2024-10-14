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
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Livewire\Component;
 
class NominatifAo extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;
        $ao = '33W-INDRA BAYU';
        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->where('AO', $ao)
            )
            ->columns([
                TextColumn::make('NAMA_NASABAH')
                            ->searchable()
                            ->label('NAMA NASABAH'),
                TextColumn::make('KODE_KOLEK')
                            ->label('KOL'),
                TextColumn::make('AO')
                            ->label('AO'),
                TextColumn::make('POKOK_PINJAMAN')
                            ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                            ->sortable()
                            ->label('BAKIDEBET'),
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