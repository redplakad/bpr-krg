<x-filament-panels::page>
    <livewire:laporan-r-b-b />

            <!-- Display session data -->

        <div class="bg-white rounded-lg border shadow-md p-4 transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-4">Daftar Kantor Cabang</h1>
        
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left" rowspan="2">Kantor Cabang</th>
                            <th class="py-3 px-6 text-left">AKTUAL {{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-left">REALISASI {{ $data['aktualTahunIni'] }}</th>
                        </tr>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nominal</th>
                            <th class="py-3 px-6 text-left">%</th>
                            <th class="py-3 px-6 text-left">Nominal</th>
                            <th class="py-3 px-6 text-left">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['cabang'] as $kantor)
                            <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out">
                                <td class="py-3 px-6">{{ $kantor->nama }}</td>
                                <td class="py-3 px-6">{{ $kantor->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        
</x-filament-panels::page>
