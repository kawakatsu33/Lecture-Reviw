<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>lecture review</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body>
        <h1>講義復習サイト!</h1>
    
        @foreach ($weeks as $week)
            <section>
                <h2>{{ $week->name }}</h2>
                @foreach ($week->subjects as $subject)
                    <p>{{ $subject->period }}限. {{ $subject->name }}</p>
                @endforeach
            </section>
        @endforeach
    
    </body>
</html>
