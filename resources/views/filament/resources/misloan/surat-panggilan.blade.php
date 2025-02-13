<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan Penyelesaian Tunggakan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            .page {
                width: 210mm; /* A4 width */
                height: 297mm; /* A4 height */
                margin-top: 0mm !Important;
                padding-top: 0mm !Important;
                padding: 10px !important;
            }
            #button {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-700 p-6 pt-1">

<div class="page bg-white p-8 mx-auto my-10" style="width: 210mm !important;min-height:310mm;height:auto;"> 
    <div class="">
        <img src="{{ asset('images/logo-text.png') }}" class="h-30 w-auto object-contain" style="width: 280px;height:auto">
    </div>
    <div class="text-left mb-6 mt-2">
        <table>
            <tr>
                <td>Nomor Surat</td>
                <td>:</td>
                <td>581/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/PT.BPR.SRG/KRG/2024</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td><u>SURAT UNDANGAN PENYELSAIAN TUNGGAKAN KREDIT</u></td>
            </tr>
        </table>
    </div>

    <div class="content mb-6">
        <h3 class="text-lg font-semibold">Kepada Yth,</h3>
        <p>Bapak/Ibu/Sdr (i) {{ $data->NAMA_NASABAH }}</p>
        <p>{{ $data->ALAMAT }} {{ $data->KELURAHAN }} {{ $data->KECAMATAN }}</p>

        <p class="mt-4">Dengan Hormat,</p>
        <p>Berdasarkan data terakhir di kantor kami, bahwa pinjaman atas nama Bapak/Ibu/Sdr(i) telah mengalami keterlambatan/tunggakan pembayaran kredit, dengan data-data sebagai berikut:</p>

        <table class="min-w-full mt-0 ml-10">
            <tbody>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Nomor rekening</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">{{ $data->NOMOR_REKENING }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Tempat Bekerja</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:200px;">{{ $data->TEMPAT_BEKERJA }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Kolektibilitas</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">
                        @switch($data->KODE_KOLEK)
                            @case(1)
                                <p>1 - Lancar</p>
                                @break
                            @case(2)
                                <p>2 - Dalam Perhatian Khusus</p>
                                @break
                            @case(3)
                                <p>3 - Kurang Lancar</p>
                                @break
                            @case(4)
                                <p>4 - Diragukan</p>
                                @break
                            @case(5)
                                <p>5 - Macet</p>
                                @break
                            @default
                                <p>Nilai kolektibilitas tidak valid.</p>
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Plafond</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->PLAFOND_AWAL,2) }}</td>
                    <td class="px-2 py-2" style="width:150px;">Bakidebet</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->POKOK_PINJAMAN,2) }}</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Tunggakan Pokok</td>
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->TUNGGAKAN_POKOK,2) }}</td>
                    <td class="px-2 py-2" style="width:150px;">Tunggakan Bunga</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->TUNGGAKAN_BUNGA,2) }}</td> 
                </tr> 
                <tr> 
                    <td class="px-2 py-2" style="width:150px;">Total Tunggakan</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->TUNGGAKAN_POKOK + $data->TUNGGAKAN_BUNGA,2) }}</td> 
                    <td class="px-2 py-2" style="width:150px;">Angsuran</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2" style="width:150px;">Rp {{ number_format($data->ANGSURAN_TOTAL,2) }}</td> 
                </tr> 
            </tbody> 
        </table>

        <p class="mt-4">Terkait hal tersebut di atas, maka kami mengundang Bapak/Ibu/Sdr(i) untuk datang dalam upaya penyelesaian pembayaran total tagihan tunggakan kredit tersebut pada:</p>

        <table class="min-w-full mt-4 ml-10">
            <thead class="">
            </thead>
            <tbody>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Kantor</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">PT BPR SERANG (Perseroda) Cabang Kragilan</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Hari / Tanggal</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">Kamis / 1 Agustus 2024</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Jam</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">10.00 WIB</td>
                </tr>
                <tr>
                    <td class="px-2 py-2" style="width:150px;">Konfirmasi</td> 
                    <td class="px-2 py-2" style="width:5px;text-align:right">:</td>
                    <td class="px-2 py-2">- Ahmad Syaifudin (081806795657) Leader Supervisi<br>- Ahmad Taju Arifin (081944201972) Leader Kredit</td>
                </tr>
            </tbody>
        </table>

        <p>Demikian surat pemberitahuan ini kami sampaikan, atas perhatian Bapak/Ibu/Sdr(i) Kami Ucapkan Terima Kasih.</p>

    </div>
    <div class="footer text-center" style="float: right;width:200px;">
        <p>Serang, {{ date('d-m-Y') }}</p>
        <p>Hormat Kami,</p>
        <br>
        <p class="text-align">TTD</p>
        <br>
        <p class="text-align"><u>Taufik Kemal</u></p>
        <p class="text-align">Kepala Cabang</p>
    </div>

</div>

</body>
</html>