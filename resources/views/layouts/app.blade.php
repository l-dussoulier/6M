<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name=" Description" content="Everything is made of dot.French Unisex Clothing Brand. by dotfibonacci">
        <meta name='subject' content='Everything is made of dot.'>
        <meta name='copyright' content='Everything is made of dot.'>
        <meta name='url' content=''>
        <meta name='date' content='Sept. 17, 2021'>
        <meta name='language' content='en'>
        <meta name="keywords" lang="fr" content="Everything is made of dot. , dot, French chlothing brand, Marque de sappe, Unisex clothing, simply design, minimalist design, petit bonhomme">
        <link rel="icon" type="image/png" href="./assets/src/logo.png" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <?php include './assets/inc/meta.inc.php' ?>
        <link rel="stylesheet" href="./assets/css/master.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
