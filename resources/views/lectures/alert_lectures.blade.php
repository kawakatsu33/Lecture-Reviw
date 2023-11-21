<x-app-layout>
    <x-slot name="header" style="background-color:#F5A9A9;">
        <h1>⚠️要復習講義</h1>
    </x-slot>
    
    <x-slot name="content">
    
    @forelse($alertLectures as $lecture)
        <section>
            
            <h2>
                <a href="{{ route('lecture_show', $lecture->id) }}">
                    {{ $lecture->times }}回目. {{ $lecture->name }}
                </a>
            </h2>
            <div class="understanding">
                <!--@if($lecture->understanding)-->
                <!--  <p>理解度: {{ $lecture->understanding->level }}</p>-->
                <!--  @php $understandingLevel = $lecture->understanding->level; @endphp-->
                <!--@else-->
                <!--  <p>理解度: 未登録</p>-->
                <!--  @php $understandingLevel = null; @endphp-->
                <!--@endif-->
                <form action="{{ route('Lv_update', $lecture->id) }}" method="POST">
                    @csrf
                <label for="level" class='understand'>理解度:</label>
                    <select name="level" id="level">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $understandingLevel == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class='reload'>更新</button>
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
        
            <a href="{{ route('lecture_edit', $lecture->id) }}" class='edit'>編集</a>
            <div class="delete">
                <form action="/lecture_delete/{{ $lecture->id }}" id="form_{{ $lecture->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteLecture({{ $lecture->id }})">削除</button>
                </form>
            </div>
        </section>
   @empty
     <p>要注意講義はありません。</p>
    
    @endforelse

    <div class='back'>
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
        
        select#level {
                width: auto; /* 選択ボックスの幅を自動または指定した値に */
                height: 36px; /* 選択ボックスの高さを自動または指定した値に */
                font-size: 0.95em; /* テキストのサイズを調整 */
                font-weight: bold;
            }
        .reload{
            border: 1px solid #000000;
            padding: 6px 15px;
            border-radius: 15px;
            margin-left:10px;
            background-color:#f5f5f5;
        }
        .understand{
            margin-left:5px;
        }
        .edit{
            border: 1px solid #000000;
            padding: 5px 7px;
            border-radius: 3px;
            margin-left:10px;
            text-align: right;
            background-color:#f5f5f5;
        }
        
        .add {
            font-size: 1.5em;
            text-align: center;
            margin: 50px 0px 20px 600px;
            
        }

        .delete {
            text-align: center;
            font-size: 0.9em;
            
            border: 1px solid #000000;
            /*padding: 5px 7px;*/
            border-radius: 3px;
            margin-left:auto;
            margin-right:30px;
            width:3%;
            background-color:#f5f5f5;
        }

        .body {
            flex: 1; /* 残りのスペースを使って伸縮 */
            margin-left: 20px;
        }
        h1 {
            font-family: 'Noto Serif JP', serif;
            font-size: 3em;  /* 文字サイズを大きくする */
            text-align:center; /* 中央揃えにする */
            margin-top: 20px;  /* 上部に余白を追加 */
             }
        h2 {
            background-color: #ffe6eb;
            display: block;
            padding: 13px;
            font-size: 1.3em;
            color:#0B0B61
            font-weight:bold;
	        border-left: 10px solid #ff0033;
        }
        
        .container {
        display: flex;
        justify-content: space-between; /* もし間隔を開けたい場合に */
        align-items: start; /* 上端に揃える場合 */
        margin-top:20px;
        margin-bottom:20px;
    }
    .pdf-display {
        flex: 0 0 600px; /* この場合、幅600pxと固定 */
        margin-right: 20px; /* PDFとBodyの間の余白 */
    }
    .back{
                text-align: right;
                margin-right: 150px;
                margin-top: 60px;
                text-decoration:underline;
                
           }
    </style>
    </x-slot>
</x-app-layout>


