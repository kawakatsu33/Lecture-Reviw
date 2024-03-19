<x-app-layout>
    <x-slot name="header">
        <h1>({{ $lecture->times }}回目) {{ $lecture->name }}      / <a class="subject_title" href="{{ route("subject_detail", ['subject'=>$subject->id]) }}" >{{ $subject->name }}</a></h1>
    </x-slot>
    
    <x-slot name="content">
   
    
        <section>
            
            
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
                <label for="level" class='understand'>理解度: </label>
                    <select name="level" id="level">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $understandingLevel == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class='reload'>更新</button>
                </form>
            </div>
        <div class="container">
            @if(!is_null($lecture->pdf_paths))
                <div class="pdf-display">
                    
                @foreach(json_decode($lecture->pdf_paths, true) as $pdf_path)
                    <iframe src="{{ secure_asset('storage/' . $pdf_path) }}" width="600" height="900" frameborder="0" style="border:none;"></iframe>
                @endforeach
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
         @font-face {
                font-family: 'Noto Serif JP';
                src: url('/Users/kawakatsuryouta/Downloads/Noto_Serif_JP/NotoSerifJP-Regular.otf') format('opentype');
                font-weight: normal;
                font-style: normal;
            }
        
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
        
        .subject_title{
            text-decoration: underline;
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
        .delete {
            text-align: right;
            margin-right:30px;
            border: 1px solid #000000;
            padding: 5px 7px;
            border-radius: 3px;
            margin-left:auto;
            margin-right:30px;
            width:3.5%;
            background-color:#f5f5f5;
        }


        .body {
            flex: 1;
            margin-left: 20px;
        }
         h1 {
            font-size: 2.2em;  
            font-family: 'Noto Serif JP', serif;
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
        margin-top:20px;
        margin-bottom:20px;
    }
    .pdf-display {
        flex: 0 0 600px; /* この場合、幅600pxと固定 */
        margin-right: 20px; /* PDFとBodyの間の余白 */
    }
        .body{
            background-color:#ffffff;
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


