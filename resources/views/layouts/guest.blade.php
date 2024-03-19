<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="講義アタックEXは、学生のための講義復習・管理アプリです。特に講義復習を効率的に行えます。">
        <title>講義アタックEX</title>

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
                    background-image: 
                    
                    background-size: cover; /* 画像をカバーするように設定 */
                    background-repeat: no-repeat; /* 画像の繰り返しを防止 */
                    background-position: center; /* 画像を中央に配置 */
                    height:125px;
                    display: flex;
                    align-items: center;
                    justify-content: center; 
                }
                
                .flex-center {
                    display: flex;
                    justify-content: center;
                    align-items: flex-start;
                    padding-top:80px;
                    height: 50px; /* 画面の高さに合わせる */
                }

                
         
            </style>
    </head>
    
    <body class="font-sans text-gray-900 antialiased">
        <!--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">-->
        <!--    <div>-->
        <!--        <a href="/">-->
        <!--            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
        <!--        </a>-->
        <!--    </div>-->
            
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        <div class="flex-center">
            <div class="w-full sm:max-w-md  px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
