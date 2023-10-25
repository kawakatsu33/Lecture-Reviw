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
        <h1>講義復習サイト</h1>
   
    <a href="{{ route('subject_register') }}">科目追加</a>
                    
        @foreach ($weeks as $week)
            <section>
                <h2>{{ $week->name }}</h2>
                @foreach ($week->subjects as $subject)
                    
                    <p>{{ $subject->period }}限</p>
                    <a href="/lectures/{{ $subject->id }}"><h2 class='title'>{{ $subject->name }}</h2></a>
                    
                    <form action="/subject_delete/{{ $subject->id }}" id="form_{{ $subject->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteSubject({{ $subject->id }})">科目削除</button> 
                    </form>
                @endforeach
            </section>
        @endforeach
        
    
    <script>
            function deleteSubject(id) {
                'use strict'
        
                if (confirm('この科目を削除してもよろしい？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
    </script>
    
    </body>
</html>
