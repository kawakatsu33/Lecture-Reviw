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
        <headere>
            <h1>{{ subjects->name }}</h1>
        </headere>  
        
            <h2>{{ $lectures->name }}</h2>
            
            @foreach($lectures->lecture)
                <section>
                    <h3>{{ $lecture->times }}</h3>
                    <p>{{ $lecture->body }}</p>
                </section>
       
    </body>
</html>
