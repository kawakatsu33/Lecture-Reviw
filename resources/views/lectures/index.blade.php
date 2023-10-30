<x-app-layout>
    <x-slot name="header">
       <h1>講義復習サイト</h1>
    </x-slot>
    
    <x-slot name="content">
        <!-- Styles -->
        <style>
             .today {
                 background-color: #f5c4ce;
                 
             }
        
            .week-container {
                display: flex;
               
                overflow-x: auto; /* 横スクロールを可能にする場合、コンテンツが横に多い時 */
                padding: 50px; /* セクション間の余白をコンテナの内側のパディングとして適用 */
                flex-wrap: nowrap; /* 横並びのままに保つための設定 */
                height: 800px;
            }

            section {
                flex: 1;
                
                 /* 下の境界線を削除 */
                border-right: 1px solid #ccc;
                background-color: #fff0f0; /* 背景色を薄ピンクに設定 */
                padding: 15px;  /* sectionの内側の余白を設定 */
                flex-basis: 0; /* 初期サイズを0に設定 */
                flex-grow: 1; /* 各sectionが同じ幅になるように成長する */
            }

            section:last-child {
                border-right: none; /* 最後のセクションの右側の境界線を削除 */
            }
            
            h1 {
            font-size: 2.5em;  /* 文字サイズを大きくする */
            text-align: center; /* 中央揃えにする */
            margin-top: 20px;  /* 上部に余白を追加 */
             }
             
             h2 {
                 text-align: center;
                 border-bottom: 3px double black;
             }
             
             h3 {
                 margin-left: 10px;
                 margin-top:10px;
                 text-decoration: underline;
             }
             
            .subject-container {
                border-bottom: 1px solid #ccc;  /* 境界線を追加 */
                height: calc(100% / 6 - 5px); /* この数字はお好みで調整してください */
                display: flex;
                flex-direction: column;
                justify-content: center; /* 中央揃えにする */
                
                }
            
            .delete {
                text-align: right;
            }
             .delete button {
                font-size: 0.7em;
                border-radius: 4px;
                border: 0.9px solid black;
                padding: 3px 6px; /* これはボタンの内側のスペースを増やすためのもので、お好みで調整してください */
                background-color: transparent; /* これによりボタンの背景が透明になります */
                cursor: pointer; /* ボタンの上にマウスカーソルがあるときに、ハンドアイコンになるようにします */
             }
             
              .add {
            text-align: right;/* 右揃えにする */
            margin: 20px 50px;    /* 上下の余白を追加 */
             }
             
            
        </style>
        

        
    <div class="user">
        ログインユーザー: {{ Auth::user()->name }}
    </div>
         <div class="add">
            <a href="{{ route('subject_register') }}" style="background-color: #FFF0F5; color: #000000; padding: 10px 15px; border-radius: 4px; text-decoration: none; border: 1px solid black;">
                科目追加
            </a>
        </div>

       <div class="week-container">             
        @foreach ($weeks as $week)
            <section @if($today == $week->name) class="today" @endif>
                <h2>{{ $week->name }}</h2>
                @for($period = 1; $period <= 6; $period++)
                    <div class="subject-container">
                        <p>{{ $period }}限</p>
                        @php
                            $subjectForPeriod = $week->subjects->firstWhere('period', $period);
                        @endphp
                        
                        @if($subjectForPeriod)
                        <a href="/lectures/{{ $subjectForPeriod->id }}"><h3 class='title'>{{ $subjectForPeriod->name }}</h3></a>
                        
                        <div class="delete">
                            <form action="/subject_delete/{{ $subjectForPeriod->id }}" id="form_{{ $subjectForPeriod->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteSubject({{ $subjectForPeriod->id }})">科目削除</button> 
                            </form>
                
                        </div>
                        @else
                            <p></p>
                        @endif
                    </div>    
                @endfor
            </section>
        @endforeach
        </div>
    
    <script>
            function deleteSubject(id) {
                'use strict'
        
                if (confirm('この科目を削除してもよろしい？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
    </script>
        </x-slot>
</x-app-layout>

