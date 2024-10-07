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
        }
        .page {
            width: 13in; /* Lebar halaman F4 */
            height: 8.27in; /* Tinggi halaman F4 */
            margin: auto; /* Pusatkan halaman */
            padding: 1in; /* Padding untuk konten */
            
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="page bg-white">
        <h1 class="text-2xl font-bold text-center mb-4">Dokumen F4 Landscape</h1>
        <p class="text-lg">Ini adalah contoh dokumen dengan ukuran kertas F4 dalam orientasi landscape menggunakan Tailwind CSS.</p>
        <p class="mt-4">Anda dapat menambahkan lebih banyak konten di sini sesuai kebutuhan.</p>
    </div>
</body>
</html>