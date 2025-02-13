<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen F4 Landscape</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: 13in 8.27in; /* Ukuran F4 dalam inci untuk landscape */
                margin: 0 !important; /* Menghilangkan margin default */
                border: 0px solid rgba(255, 255, 255, 0.0);
                padding: 1cm !important;
            }
            .page-break {
                page-break-before: always; /* Memaksa pemisahan halaman sebelum elemen ini */
                break-before: page; /* Alternatif modern untuk page-break-before */
            }
        }
        .page {
            width: 13in; /* Lebar halaman F4 */
            min-height: 8.27in; /* Tinggi halaman F4 */
            height: auto;
            margin: auto; /* Pusatkan halaman */
            padding: 25px; /* Padding untuk konten */
            
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="page bg-white">
        <h1 class="text-sm text-center font-bold">LAPORAN EVALUASI KINERJA KEUANGAN (REALISASI RBB) KANTOR PUSAT DAN CABANG PT BPR SERANG</h1>
        <h1 class="text-sm text-center font-bold">PER TANGGAL {{ $data['aktualTahunIni'] }}</h1>

        <div class="transition-transform duration-300 w-full">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h1 class="text-xs font-bold uppercase">POS ANGGARAN : ASET</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 border">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($data['assets'] as $asset)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-1 px-3 hover:font-bold">{{ $asset['cabang'] }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($asset['aktualTahunLalu'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($asset['rbb'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($asset['aktualTahunIni'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right 
                                {{ $asset['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $asset['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $asset['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $asset['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($asset['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
        <br>

        <div class="transition-transform duration-300 w-full">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h2 class="text-xs font-bold uppercase">POS ANGGARAN : KREDIT</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 border ">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($data['kredits'] as $kredit)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-1 px-3 hover:font-bold">{{ $kredit['cabang'] }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($kredit['aktualTahunLalu'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($kredit['rbb'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($kredit['aktualTahunIni'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right 
                                {{ $kredit['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $kredit['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $kredit['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $kredit['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($kredit['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <p class="page-break"></p>
        <div class="transition-transform duration-300 w-full">
            <div class="fi-ta-header flex flex-col gap-3 p-4 sm:px-6 sm:flex-row sm:items-center">
                <h2 class="text-xs font-bold uppercase">POS ANGGARAN : TABUNGAN</h1>
            </div>
            <div class="overflow-x-auto">
                <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 border ">
                    <thead clas>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-2 text-center" rowspan="2">KANTOR CABANG</th>
                            <th class="py-1 px-2 text-center">AKTUAL</th>
                            <th class="py-1 px-2 text-center">RBB</th>
                            <th class="py-1 px-2 text-center">REALISASI</th>
                            <th class="py-1 px-2 text-center" colspan="2">PERTUMBUHAN TAHUN LALU</th>
                            <th class="py-1 px-2 text-center" colspan="2">PENCAPAIAN</th>
                        </tr>
                        <tr class="bg-gray-50 dark:bg-white/5 uppercase text-xs">
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunLalu'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">{{ $data['aktualTahunIni'] }}</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                            <th class="py-1 px-3 text-center">NOMINAL</th>
                            <th class="py-1 px-3 text-center">%</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($data['tabungans'] as $tabungan)
                        <tr class="border-b hover:bg-gray-100 transition duration-300 ease-in-out hover:text-gray-800">
                            <td class="py-1 px-3 hover:font-bold">{{ $tabungan['cabang'] }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($tabungan['aktualTahunLalu'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($tabungan['rbb'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right">{{ number_format($tabungan['aktualTahunIni'], 2) }}</td>
                            <td class="py-1 px-3 hover:font-bold text-right 
                                {{ $tabungan['pertumbuhan_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pertumbuhan_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $tabungan['pertumbuhan_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pertumbuhan_persentase'], 2) }}%
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $tabungan['pencapaian_nominal'] < 0 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pencapaian_nominal'], 2) }}
                            </td>
                            <td class="py-1 px-3 hover:font-bold text-right {{ $tabungan['pencapaian_persentase'] < 100 ? 'text-primary-500' : 'text-success-500' }}">
                                {{ number_format($tabungan['pencapaian_persentase'], 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        

    </div>
</body>
</html>