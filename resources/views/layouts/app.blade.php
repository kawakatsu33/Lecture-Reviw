<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LectureAttackEX') }}</title>

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
                
                /*header.bg-white.shadow h1 {*/
                /*    margin-left: auto;*/
                /*    margin-right: auto;*/
                    /*width: fit-content; */
                /*}*/
                
                /* ナビゲーションリンクのスタイル */
    /*.nav-link-custom {*/
        
        color: ; /* 文字色 */
        border: 1px solid black; /* 黒い枠 */
    /*    padding:5px;*/
        margin: 5px; /* 外側の余白 */
        border-radius: ; /* 枠の角を丸くする */
        
    /*}*/
    /*.nav-link-custom:hover {*/
        background-color: darkred; /* ホバー時の背景色 */
        color: white; /* ホバー時の文字色 */
    /*}*/
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
