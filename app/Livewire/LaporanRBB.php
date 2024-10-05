<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;

class LaporanRBB extends Component
{
    public $bulan;
    public $tahun;

    public function submit()
    {
        // Validate inputs
        $this->validate([
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
        ]);
                // Optionally, reset the fields after submission
        $this->reset(['bulan', 'tahun']);
        // Store values in session
        session([
            'selected_bulan' => $this->bulan,
            'selected_tahun' => $this->tahun,
        ]);

        // Optionally, reset the fields after submission
        $this->reset(['bulan', 'tahun']);
        
        // Emit a success message or event if needed
        $this->dispatch('dataSubmitted', ['message' => 'Data saved successfully!']);
    }

    public function render()
    {
        return view('livewire.laporan-r-b-b');
    }
}
