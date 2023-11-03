<x-app-layout>
    <x-slot name="header">
        <h1>{{ $subject->name }}</h1>
    </x-slot>
    
    <x-slot name="content">
   
    <div class="user">
        @if(Auth::check())
            ログインユーザー: {{ Auth::user()->name }}
        @else
            ログインしていません
        @endif

    </div>
    
    
        <section>
            
            <h2>{{ $lecture->times }}回目. {{ $lecture->name }}</h2>
            <div class="understanding">
                @if($lecture->understanding)
                  <p>理解度: {{ $lecture->understanding->level }}</p>
                  @php $understandingLevel = $lecture->understanding->level; @endphp
                @else
                  <p>理解度: 未登録</p>
                  @php $understandingLevel = null; @endphp
                @endif
                <form action="{{ route('Lv_update', $lecture->id) }}" method="POST">
                    @csrf
                <label for="level">理解度レベル:</label>
                    <select name="level" id="level">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $understandingLevel == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit">更新</button>
                </form>
            </div>
        <div class="container">
            @if($lecture->pdf_path)
                <div class="pdf-display">
                   
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


