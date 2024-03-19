<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <meta name="description" content="講義アタックEXは、学生のための講義復習・管理アプリです。特に講義復習を効率的に行えます。">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
                main {
                    background-color: #fcfcfc;
                }
                
                header.bg-white.shadow {
                    background-color:#fff0f9;
                    background-image: url('/Users/kawakatsuryouta/Downloads/桜ヘッダー.jpg');
                    
                    background-size: cover; /* 画像をカバーするように設定 */
                    background-repeat: no-repeat; /* 画像の繰り返しを防止 */
                    background-position: center; /* 画像を中央に配置 */
                    height:125px;
                    display: flex;
                    align-items: center;
                    justify-content: center; 
                }
         
            </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
               {{  $content }}
            </main>
        </div>
    </body>
</html>
