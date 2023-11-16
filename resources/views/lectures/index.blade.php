<x-app-layout>
    <x-slot name="header">
       <h1>講義アタックEX</h1>
       
        <div class="user">
        @if(Auth::check())
            
        @else
            ログインしていません
            <a href="{{ route('register') }}">新規登録</a>

        @endif

    </div>
    </x-slot>
   
    <x-slot name="content">
        <!-- Styles -->
        <style>
        
            
             .today {
                 background-color: #f5c4ce;
                 
             }
            .all_list {
                display: flex;
                justify-content: space-between;
                padding: 20px;
                 
            }
            
            .timetable_block{
                width: 63%; 
            }
            .week-container {
                display: flex;
                flex-direction: row;
                flex-grow: 2;
                
                margin-left: 40px;
                margin-top:20px;
                overflow-x: auto; /* 横スクロールを可能にする場合、コンテンツが横に多い時 */
                padding: 10px; /* セクション間の余白をコンテナの内側のパディングとして適用 */
                flex-wrap: nowrap; /* 横並びのままに保つための設定 */
                
            }
            .new-lectures-block {
                /*flex-grow: 1;*/
                width: 25%;  /* ブロックの幅を調整する */
                
                margin: 5px 30px 5px 10px;
            }


            section {
                flex: 1;
                
                 /* 下の境界線を削除 */
                border-right: 1px solid #ccc;
                background-color: #ffebf5;
                padding: 7.5px;  /* sectionの内側の余白を設定 */
                flex-basis: 0; /* 初期サイズを0に設定 */
                flex-grow: 1; /* 各sectionが同じ幅になるように成長する */
            }

            section:last-child {
                border-right: none; /* 最後のセクションの右側の境界線を削除 */
            }
            
            @font-face {
                font-family: 'Noto Serif JP';
                src: url('/Users/kawakatsuryouta/Downloads/Noto_Serif_JP/NotoSerifJP-Regular.otf') format('opentype');
                font-weight: normal;
                font-style: normal;
            }

            
            h1 {
            font-family: 'Noto Serif JP', serif;
            font-size: 3em;  /* 文字サイズを大きくする */
            text-align:center; /* 中央揃えにする */
            margin-top: 20px;  /* 上部に余白を追加 */
             }
             
             h2 {
                 font-size: 0.9em;
                 text-align: center;
                 border-bottom: 3px double black;
             }
             
             h3 {
                 font-size: 0.9em;
                 margin-left: 5px;
                 margin-top:5px;
                 text-decoration: underline;
             }
             
            .subject-container {
                border-bottom: 1px solid #ccc;
                height: 100px; /* 高さをここで固定しています。 */
                display: flex;
                flex-direction: column;
                justify-content: center;
                flex-shrink: 0; /* これにより、子要素は縮小しません */
                flex-grow: 0;   /* これにより、子要素は拡大しません */
                /* 追加すると良いかもしれない */
                min-height: 100px; /* 最小の高さを保証します。 */
                overflow: hidden;  /* 子要素がはみ出ないようにします。 */
                margin-bottom: auto;
            }
                        
            .delete {
                text-align: right;
            }
             .delete button {
                font-size: 0.35em;
                border-radius: 4px;
                border: 0.5px solid black;
                padding: 1.5px 3px; /* これはボタンの内側のスペースを増やすためのもので、お好みで調整してください */
                background-color: transparent; /* これによりボタンの背景が透明になります */
                cursor: pointer; /* ボタンの上にマウスカーソルがあるときに、ハンドアイコンになるようにします */
             }
             
              .add {
            text-align: right;/* 右揃えにする */
           
            
             }
             
             .sub_alert_info {
                display: inline-block; /* インラインブロック要素として表示 */
                margin-left: 10px; /* 左側のマージンを適宜調整 */
            }
            
            .lecture_details {
                flex: 1; /* これにより、lecture_title が左に配置されます */
            }
            
            .lecture_title {
                color: #0844DD; /* Bootstrap default link color */
                
                font-size:1.2em;
                padding-left:30px;
                margin-right: auto; /* これにより、右側にスペースを作ります */
                font-weight:bold;
                        }
                        
            .lecture_new_title {
                color: #0844DD; /* Bootstrap default link color */
                text-decoration: underline;
                font-size:1.2em;
                padding-left:30px;
                margin-right: auto; /* これにより、右側にスペースを作ります */
                font-weight:bold;
                        }
                        
            .alert_list {
                width: 80%;
                margin-left: 20px;
                margin-right: auto;
                /*border-top: 0.7px solid #000; */
                padding: 10px; /* 枠線の内側にパディングを追加 */
                box-sizing: border-box; /* パディングとボーダーを幅に含める */
            }
            
            /*.alert_list :first-child {*/
            /*    border-top: none;*/
            /*}*/
            
          
            .alert_list_ul li:nth-child(odd) {
                background-color: #f2f2f2; /* ここで好きな色を指定 */
            }
            
            .alert_list_ul li:nth-child(even) {
                background-color: #FFFFFF; /* ここで好きな色を指定 */
            }
            
            .lectures-container{
                margin-top:35px;
                
            }
            
            
            .lectures-container .new_list_li:nth-child(odd) {
                background-color: #f2f2f2; /* 奇数番目の要素の背景色 */
            }
            
            .lectures-container .new_list_li:nth-child(even) {
                background-color: #FFFFFF; /* 偶数番目の要素の背景色 */
            }
    
            
            h4 {
                font-size: 1.25em;
                font-weight: bold;

            }
            
            h5 {
                margin-left: 40px;
                font-weight: bold;
                margin-top: 30px;
                font-size: 1.25em;
            }
            
            h6 {
                font-weight: bold;
                margin-top: 20px;
                font-size: 1.25em;
            }
            
            .latest_items {
                margin-left:10px;
                display: block;
                text-align: left;
                 border-bottom:1px solid #ccc;
            }
            
            .new_list_li {
                margin-left:10px;
                display: block;
                text-align: left;
                 border-bottom:1px solid #ccc;
            }
        
            .alert_list_item {
                display: flex;
                justify-content: space-between;
                padding:5px 30px 5px 0px;
                align-items: flex-end;
                 border-bottom:1px solid #ccc;
            }
            
            .alert_list_ul {
                    list-style: none;
                    padding: 0;
                }
            
            

            .lecture_title:hover {
                
                color:#0844DD;
            }
            
            .sub_alert_info {
                text-align: right;
                
                font-size: 0.68em;
                font-weight: bold;
                
            }
            
            .sub_new_lectures {
                text-align: right;
                
                font-size: 0.7em;
                font-weight: bold;
                
            }
            
            .full_alert_link {
                display: block;
                text-align: right;
                padding:5px 5px 0px 0px;
                color: #0844DD;
                text-decoration: underline;
            }
            
            .lecture_body{
                
                width: 100%;  /* ブロックの幅を調整する */
                padding:10px 20px 0px 15px;
                word-wrap: break-word; /* 長い単語が境界を超えそうになった場合に折り返しを行う */
                overflow-wrap: break-word; /* 長い単語を強制的に折り返す */
                white-space: normal; /* テキストの折り返しを行う */
                
                
                            
            }
            
            .sub_subject_name{
                text-decoration:underline;
                color:#1D0E81;
            }
            
            
        </style>
        

        
    
    
        <div class="alert_list">
                <h4>要復習リスト　(理解度1-2)</h4>
                    <div class="alert_list_items">
                        <span class="latest_items">最新5件</span>
                            
                         <ul class="alert_list_ul">
                             
                            @forelse($low_level->take(5) as $lecture)
                                <li class="alert_list_item">
                                    <a class="lecture_title" href="{{ route('lecture_show', $lecture->id) }}">
                                        {{ $lecture->name }} 
                                    </a>
                                
                                    <div class="sub_alert_info">
                                        理解度({{ optional($lecture->understanding)->level ?? '未定義' }})
                                        / <a href ="{{ optional($lecture->subject)->id ? route('subject_detail', ['subject' => $lecture->subject->id]) : '#' }}">
                                            <span class="sub_subject_name">{{ optional($lecture->subject)->name ?? '未定義' }}</span>
                                        </a>
                                        , {{ $lecture->created_at->format('m/j') }}
                                        , {{ $lecture->created_at->format('l') }}
                                        , {{ $lecture->subject->period ?? '未定義' }}限
                                    </div>
                                </li>
                            @empty
                                <li>要注意講義はありません</li>
                                <li>よく頑張っています</li>
                            @endforelse
                         </ul>
                   
                    <a class="full_alert_link" href="{{ route('alert_lectures') }}">» 要復習講義一覧</a>
               </div>
        </div> 
    <div class="all_list"> 
    <div class="timetable_block">
        <h5>時間割表</h5>
               <div class="week-container">             
                @foreach ($weeks as $week)
                    <section @if($today == $week->name) class="today" @endif>
                        <h2>{{ $week->name }}</h2>
                        @for($period = 1; $period <= 7; $period++)
                                @php
                                    $subjectForPeriod = $week->subjects->firstWhere('period', $period);
                                @endphp
                                <div class="subject-container">
        
                                <p>{{ $period }}限</p>
        
                                
                                @if($subjectForPeriod)
                               <a href="{{ route('subject_detail', $subjectForPeriod->id) }}"><h3 class='title'>{{ $subjectForPeriod->name }}</h3></a>
                                
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
                <div class="add">
                <a href="{{ route('subject_register') }}" style="background-color: #FFF0F5; color: #000000; padding: 10px 15px; border-radius: 4px; text-decoration: none; border: 1px solid black;">
                    科目追加
                </a>
        </div>
    </div>
       
    
    <div class="new-lectures-block">
                    <h6>新着講義</h6>
                    <div class="lectures-container">
                        @forelse ($new_lectures as $lecture)
                            <div class="latest_items new_list_li">
                                <a class="lecture_new_title" href="{{ route('lecture_show', $lecture->id) }}">{{ $lecture->name }}</a>
                                <p class='lecture_body'>{{ \Illuminate\Support\Str::limit(($lecture->body),70, '......') }}</p>
                                <p class="sub_new_lectures">{{ $lecture->created_at->format('m/j G時i分s秒') }}</p>
                                
                            </div>
                        @empty
                            <p class="lecture_new_title">講義情報がありません！！</p>
                            <p class='lecture_body'>時間割表に科目を追加し、講義を登録してください。</p>
                        @endforelse
                    </div>
    </div>
    
            
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

