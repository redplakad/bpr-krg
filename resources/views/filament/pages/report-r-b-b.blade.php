<x-filament-panels::page>
    <livewire:laporan-r-b-b />
        <!-- Display session data -->

        <div class="bg-white rounded-lg border shadow-md transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xl font-bold uppercase">EVALUASI ASET</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['assets'] as $asset)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-3 px-6 hover:font-bold">{{ $asset['cabang'] }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($asset['aktualTahunLalu'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($asset['rbb'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($asset['aktualTahunIni'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right 
                                {{ $asset['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $asset['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $asset['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $asset['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg border shadow-md transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xl font-bold uppercase">EVALUASI KREDIT</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['kredits'] as $kredit)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-3 px-6 hover:font-bold">{{ $kredit['cabang'] }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($kredit['aktualTahunLalu'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($kredit['rbb'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($kredit['aktualTahunIni'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right 
                                {{ $kredit['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $kredit['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $kredit['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $kredit['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg border shadow-md transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xl font-bold uppercase">EVALUASI TABUNGAN</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['tabungans'] as $tabungan)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-3 px-6 hover:font-bold">{{ $tabungan['cabang'] }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($tabungan['aktualTahunLalu'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($tabungan['rbb'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($tabungan['aktualTahunIni'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right 
                                {{ $tabungan['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $tabungan['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $tabungan['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $tabungan['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg border shadow-md transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xl font-bold uppercase">EVALUASI DEPOSITO</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['depositos'] as $deposito)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-3 px-6 hover:font-bold">{{ $deposito['cabang'] }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($deposito['aktualTahunLalu'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($deposito['rbb'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($deposito['aktualTahunIni'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right 
                                {{ $deposito['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($deposito['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $deposito['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($deposito['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $deposito['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($deposito['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $deposito['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($deposito['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="bg-white rounded-lg border shadow-md transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xl font-bold uppercase">EVALUASI LABA</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-sm">
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                            <th class="py-3 px-6 text-center">NOMINAL</th>
                            <th class="py-3 px-6 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($data['labas'] as $laba)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-3 px-6 hover:font-bold">{{ $laba['cabang'] }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($laba['aktualTahunLalu'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($laba['rbb'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right">{{ number_format($laba['aktualTahunIni'], 2) }}</td>
                            <td class="py-3 px-6 hover:font-bold text-right 
                                {{ $laba['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($laba['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $laba['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($laba['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $laba['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($laba['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-3 px-6 hover:font-bold text-right {{ $laba['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($laba['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="fi-ta-content divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">

    </div>
        
</x-filament-panels::page>
