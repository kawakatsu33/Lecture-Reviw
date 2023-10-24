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
        
           <h1>科目登録</h1> 
           
           <form action="/subject_store" method="POST">
               @csrf

                <div class="week">
                    <h2>週</h2>
                    <select name="week_id">
                        @foreach($weeks as $week)
                            <option value="{{ $week->id }}">{{ $week->name }}</option>
                        @endforeach
                    </select>
                </div>
                
               <div class="name">
                    <h3>科目名</h3>
                    <input type="text" name='subject[name]' placeholder="科目名" value="{{ old('subject.name') }}">
                </div>
                
                <div class='period'>
                    <input type="number" name='subject[period]' placeholder="n" value="{{ old('subject.period') }}">
                </div>
                
                <input type="submit" value="登録">
            </form>
        <div>
        <a href="{{ route('lectures.index') }}">トップに戻る</a>
        </div>
    </body>
</html>
