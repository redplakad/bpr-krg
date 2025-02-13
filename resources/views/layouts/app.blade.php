<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="title" content="Monitoring Kredit PT BPR Serang" />
        <meta name="description" content="Solusi Terpadu untuk Monitoring, Pengawasan, dan Mitigasi Risiko Keuangan" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="kredit.bankserang.com" />
        <meta property="og:title" content="Monitoring Kredit PT BPR Serang" />
        <meta property="og:description" content="Solusi Terpadu untuk Monitoring, Pengawasan, dan Mitigasi Risiko Keuangan" />

        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="kredit.bankserang.com" />
        <meta property="twitter:title" content="Monitoring Kredit PT BPR Serang" />
        <meta property="twitter:description" content="Solusi Terpadu untuk Monitoring, Pengawasan, dan Mitigasi Risiko Keuangan" />
 
        <title>{{ config('app.name') }}</title>
 
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
 
        @filamentStyles
        @vite('resources/css/app.css')
        @stack('custom-css')
    </head>
 
    <body class="antialiased">
        {{ $slot }}
 
        @filamentScripts
        @vite('resources/js/app.js')
        @stack('custom-js')
    </body>
</html>