<x-filament-panels::page>
    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200">NPL PER PRODUK</h1>
    <div class="bg-white rounded-lg border shadow-md p-4 transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">     
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">PRODUK</th>
                        <th scope="col" class="px-6 py-3 text-center">DEBITUR</th>
                        <th scope="col" class="px-6 py-3 text-center">BAKIDEBET</th>
                        <th scope="col" class="px-6 py-3 text-center">NPL</th>
                        <th scope="col" class="px-6 py-3 text-center">% </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['loan-produk'] as $loan)
                    <tr class="{{ $loop->last ? 'bg-white hover:bg-gray-50 dark:bg-gray-900 hover:dark:bg-gray-800' : 'bg-white border-b hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 hover:dark:bg-gray-800' }}">
                        <td class="fi-ta-text grid gap-y-1 px-3 py-4 dark:text-white">
                            {{ $loan->KET_KD_PRD }}
                        </td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_debitur,0) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_pokok, 2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_npl, 2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format(($loan->total_npl / $loan->total_pokok) * 100, 2) }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200">KOLEKTIBILITAS PER PRODUK</h1>
    <div class="bg-white rounded-lg border shadow-md p-4 transition-transform duration-300 w-full dark:bg-gray-800 dark:border-gray-700">     
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">PRODUK</th>
                        <th scope="col" class="px-6 py-3 text-center">1 - LANCAR</th>
                        <th scope="col" class="px-6 py-3 text-center">2 - DPK</th>
                        <th scope="col" class="px-6 py-3 text-center">3 - KURANG LANCAR</th>
                        <th scope="col" class="px-6 py-3 text-center">4 - DIRAGUKAN</th>
                        <th scope="col" class="px-6 py-3 text-center">5 - MACET</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['loan-produk-kol'] as $loan)
                    <tr class="{{ $loop->last ? 'bg-white hover:bg-gray-50 dark:bg-gray-900 hover:dark:bg-gray-800' : 'bg-white border-b hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 hover:dark:bg-gray-800' }}">
                        <td class="fi-ta-text grid gap-y-1 px-3 py-4 dark:text-white">
                            {{ $loan->KET_KD_PRD }}
                        </td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_1,2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_2, 2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_3, 2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_4, 2) }}</td>
                        <td class="px-6 py-4 dark:text-white text-right">{{ number_format($loan->total_5, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>        
</x-filament-panels::page>