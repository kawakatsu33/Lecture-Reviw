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
        
           <h1>講義登録</h1> 
           
           <form action="/lectures/subject_detail" method="POST">
               @csrf
               <div class="title">
                    <h2>講義名</h2>
                    <input type="text" name='lecture[title]' placeholder="講義名" value="{{ old('lecture.title') }}">
                </div>
                
                <div class='body'>
                    <h3>Note</h3>
                    <textarea name="lecture[body]" placeholder="What did you do?">{{ old('lecture.body') }}</textarea>
                </div>
                
                <input type="submit" value="登録">
            </form>
        <div>
        <a href="{{ route('lectures.index') }}">トップに戻る</a>
        </div>
    </body>
</html>
