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
        
           <h1>講義編集</h1> 
           
           <form action="/lectures/{{ $lecture->id }}" method="POST">
               @csrf
               @method('PUT')
               

               
               <div class="name">
                    <h2>講義名</h2>
                    <input type="text" name='lecture[name]'  value="{{ $lecture->name }}">
                </div>
                
                <div class='times'>
                    <input type="number" name='lecture[times]'  value="{{ $lecture->times }}">.回
                </div>
                
                <div class='body'>
                    <h3>Note</h3>
                    <textarea name="lecture[body]">{{ $lecture->body }}</textarea>
                    
                </div>
                
                <input type="submit" value="編集実行">
            </form>
        <div>
        <a href="{{ route('lectures.index') }}">トップに戻る</a>
        </div>
    </body>
</html>
