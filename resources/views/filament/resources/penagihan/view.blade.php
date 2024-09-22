<x-filament-panels::page @class([
    'fi-resource-view-record-page',
    'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
    'fi-resource-record-' . $record->getKey(),
])>
    {{ str_replace('/', '-', $this->getResource()::getSlug()) }}
    <div class="bg-white rounded-lg border shadow-md p-6 transition-transform duration-300 w-96"
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
                        {{ $record->id_debitur }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Bakidebet
                    </div>
                    <div class="p-4">
                        {{ number_format($record->bakidebet) }}
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
                        {{ number_format($record->tunggakan_pokok,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Tunggakan Bunga
                    </div>
                    <div class="p-4">
                        {{ number_format($record->tunggakan_bunga,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Petugas Ao
                    </div>
                    <div class="p-4">
                        {{ $record->petugas_ao }}
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div class="p-4">
                        <img src="{{ asset('storage/'.$record->foto1) }}" class="object-cover h-48 w-96">
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div class="p-4">
                        <img src="{{ asset('storage/'.$record->foto2) }}" class="object-cover h-48 w-96">
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div class="p-4">
                       <img src="{{ asset('storage/'.$record->foto3) }}" class="object-cover h-48 w-96">
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div class="p-4">
                        <img src="{{ asset('storage/'.$record->foto4) }}" class="object-cover h-48 w-96">
                    </div>
                </div>
                
                
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Lokasi Penagihan {{ var_dump($abc) }}
                    </div>
                    <div class="p-4">
                        <a href="http://maps.google.com/?q={{ $record->koordinat }}"
                            class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-gray fi-btn-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 fi-ac-btn-action" target="blank"> <x-heroicon-s-map class="h-6 w-6 text-red-600" /> Klik untuk melihat lokasi</a>
                    </div>
                </div>
            </div>
        </div>
        <button
            class="bg-blue-500 text-white mt-4 px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring">Button</button>
    </div>


    <div class="fi-ac gap-3 flex flex-wrap items-center justify-start">
        <a href="../../{{ str_replace('/', '-', $this->getResource()::getSlug()) }}"
            class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-gray fi-btn-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 fi-ac-btn-action">Back</a>
    </div>

</x-filament-panels::page>
