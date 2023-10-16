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
        <header>
            <h1>{{ $subject->name }}</h1>
        </header>  
        
            
        <a href="{{ route('lecture_register',['subject_id'=>$subject->id]) }}">講義追加</a>
        


            @foreach($subject->lectures as $lecture)
                <section>
                    <h2>{{ $lecture->times }}回目. {{ $lecture->name }}</h2>
                    <p>{{ $lecture->body }}</p>
                    <a href="{{ route('lecture_edit', $lecture->id) }}">編集</a>
                </section>
            @endforeach
            
        <div>
        <a href="{{ route('lectures.index') }}">トップに戻る</a>
        </div>
    </body>
</html>
