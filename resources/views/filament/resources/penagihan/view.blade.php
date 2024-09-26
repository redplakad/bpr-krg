<x-filament-panels::page @class([
    'fi-resource-view-record-page',
    'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
    'fi-resource-record-' . $record->getKey(),
])>
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
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Lokasi Debitur
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.93124603485!2d{{$record->koordinat['lng']}}!3d{{$record->koordinat["lat"]}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDgnMjMuOCJTIDEwNsKwMTcnMjAuNSJF!5e0!3m2!1sid!2sid!4v1727337773322!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        Foto Dokumentasi
                    </div>
                    <div class="p-4">
                        @if(!empty($record->foto1))
                        <img src="{{ asset('storage/'.$record->foto1) }}" class="object-cover h-48 w-96">
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
                    <div class="p-4">                        
                        @if(!empty($record->foto2))
                        <img src="{{ asset('storage/'.$record->foto2) }}" class="object-cover h-48 w-96">
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
                    <div class="p-4">                        
                        @if(!empty($record->foto3))
                       <img src="{{ asset('storage/'.$record->foto3) }}" class="object-cover h-48 w-96">
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
                    <div class="p-4">                        
                        @if(!empty($record->foto4))
                        <img src="{{ asset('storage/'.$record->foto4) }}" class="object-cover h-48 w-96">
                        @else
                        -tidak ada foto-
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="fi-ac gap-3 flex flex-wrap items-center justify-start">
        <a href="../../{{ str_replace('/', '-', $this->getResource()::getSlug()) }}"
            class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-gray fi-btn-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 fi-ac-btn-action">Back</a>
    </div>

</x-filament-panels::page>
