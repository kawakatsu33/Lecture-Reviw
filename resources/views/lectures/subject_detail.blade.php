<x-app-layout>
    <x-slot name="header">
        <h1>{{ $subject->name }}</h1>
    </x-slot>
    
    <x-slot name="content">
    <div class="add">
        <a href="{{ route('lecture_register', ['subject_id' => $subject->id]) }}"style="background-color: #FFF0F5; color: #000000; padding: 10px 15px; border-radius: 4px; text-decoration: none; border: 1px solid black;">講義追加</a>
    </div>
    <div class="user">
        ログインユーザー: {{ Auth::user()->name }}
    </div>
    
    @foreach($subject->lectures as $lecture)
        <section>
            
            <h2>{{ $lecture->times }}回目. {{ $lecture->name }}</h2>
      
            
        <div class="container">
            @if($lecture->pdf_path)
                <div class="pdf-display">
                    <!--<object data="{{ secure_asset('storage/' . $lecture->pdf_path) }}" type="application/pdf" width="100%" height="100%"></object>-->
                    <iframe src="{{ secure_asset('storage/' . $lecture->pdf_path) }}" width="600" height="900" frameborder="0" style="border:none;"></iframe>
                </div>
            @endif

                <div class="body">
                        <p>{!! nl2br(e($lecture->body)) !!}</p>
                </div>
        </div>
        
            <a href="{{ route('lecture_edit', $lecture->id) }}">編集</a>
            <div class="delete">
                <form action="/lecture_delete/{{ $lecture->id }}" id="form_{{ $lecture->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteLecture({{ $lecture->id }})">削除</button>
                </form>
            </div>
        </section>
    @endforeach

    <div>
        <a href="{{ route('index') }}">トップに戻る</a>
    </div>

    <script>
        function deleteLecture(id) {
            'use strict';

            if (confirm('この講義消えていいの？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>

    <style>
        section {
            border-bottom: 2px solid #ccc;
            padding: 20px 0;
        }

        section:last-of-type {
            border-bottom: none;
        }

        .add {
            font-size: 1.5em;
            text-align: center;
            margin: 50px 0px 20px 600px;
            
        }

        .delete {
            text-align: right;
        }

        .body {
            flex: 1; /* 残りのスペースを使って伸縮 */
            margin-left: 20px;
        }
         h1 {
            font-size: 2.2em;  /* 文字サイズを大きくする */
            text-align: center; /* 中央揃えにする */
            margin-top: 20px;  /* 上部に余白を追加 */
             }
        h2 {
            background-color: #ffe6eb;
            display: block;
            padding: 5px;
        }
        
        .container {
        display: flex;
        justify-content: space-between; /* もし間隔を開けたい場合に */
        align-items: start; /* 上端に揃える場合 */
    }
    .pdf-display {
        flex: 0 0 600px; /* この場合、幅600pxと固定 */
        margin-right: 20px; /* PDFとBodyの間の余白 */
    }
    </style>
    </x-slot>
</x-app-layout>


