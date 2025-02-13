<x-filament-panels::page @class([
    'fi-resource-view-record-page',
    'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
    'fi-resource-record-' . $record->getKey(),
])>

    @push('custom-css')
    @media print {
        <style>
            /* Modal Styles */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1000; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
            }
            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }
            .close {
                position: absolute;
                top: 20px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }
            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    }
    @endpush
    <div id="printarea" class="bg-white rounded-lg border shadow-md p-6 transition-transform duration-300 w-96"
        :class="hovered ? 'transform scale-105 shadow-md' : ''">
        <h2 class="text-lg font-semibold mb-4">Detail Penagihan a.n {{ $record->nama_debitur }}</h2>
        <!-- Grid inside Card -->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Nama Debitur
                    </div>
                    <div class="p-4">
                        {{ $record->nama_debitur }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        No Rekening
                    </div>
                    <div class="p-4">
                        {{ $loan->NOMOR_REKENING }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Bakidebet
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($loan->POKOK_PINJAMAN) }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Tunggakan Pokok
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($loan->TUNGGAKAN_POKOK,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Tunggakan Bunga
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($loan->TUNGGAKAN_BUNGA,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Petugas Ao
                    </div>
                    <div class="p-4">
                        @foreach ($ao as $a)
                        <span class="inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                            <svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                              <circle cx="3" cy="3" r="3" />
                            </svg>
                            {{ $a }}
                          </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <div class="grid grid-cols-1 colspan-3">
                    <div class="p-4 font-semibold">
                        Hasil Kunjungan
                    </div>
                    <div>
                        <p class="p-4">{{ $record->hasil_kunjungan }}</p>
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Lokasi Debitur
                    </div>
                    @if(!empty($record->koordinat))
                    <iframe src="//maps.google.com/maps?q={{$record->koordinat["lat"]}},{{$record->koordinat['lng']}}&z=15&output=embed" style="border:0;width:100%;min-width:300px;max-width:745px;height:400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div>
                        @if(!empty($record->foto1))
                        <img src="{{ asset('storage/'.$record->foto1) }}" class="max-w-full  h-auto max-w-md rounded-lg cursor-pointer transition-transform duration-300 transform hover:scale-105" style="width:100%;max-width:745px;height:auto;max-height:400px;" onclick="openModal(this)">
                        @else
                        -tidak ada foto-
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div>                        
                        @if(!empty($record->foto2))
                        <img src="{{ asset('storage/'.$record->foto2) }}" class="max-w-full  h-auto max-w-md rounded-lg cursor-pointer transition-transform duration-300 transform hover:scale-105" style="width:100%;max-width:745px;height:auto;max-height:400px;">
                        @else
                        -tidak ada foto-
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div>                        
                        @if(!empty($record->foto3))
                       <img src="{{ asset('storage/'.$record->foto3) }}" class="max-w-full  h-auto max-w-md rounded-lg cursor-pointer transition-transform duration-300 transform hover:scale-105" style="width:100%;max-width:745px;height:auto;max-height:400px;">
                       @else
                       -tidak ada foto-
                       @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div>                        
                        @if(!empty($record->foto4))
                        <img src="{{ asset('storage/'.$record->foto4) }}" class="max-w-full  h-auto max-w-md rounded-lg cursor-pointer transition-transform duration-300 transform hover:scale-105" style="width:100%;max-width:745px;height:auto;max-height:400px;">
                        @else
                        -tidak ada foto-
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="fi-ac gap-3 flex flex-wrap items-center justify-start">
        <x-filament::button 
        icon="heroicon-o-arrow-left-end-on-rectangle"
        href="../../{{ str_replace('/', '-', $this->getResource()::getSlug()) }}"
        tag="a"
        color="gray"
    >
        Kembali
    </x-filament::button>    
    <x-filament::button 
        icon="heroicon-o-printer"
        href="../../{{ str_replace('/', '-', $this->getResource()::getSlug()) }}/{{ $record->id }}/print"
        tag="a"
        color="info"
    >
        Print
    </x-filament::button>
    </div>
</x-filament-panels::page>
