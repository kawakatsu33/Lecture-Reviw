<x-app-layout>
    <x-slot name="header">
        <h1>科目登録</h1> 
    </x-slot>
    <x-slot name="content">
        <style>
         @font-face {
                font-family: 'Noto Serif JP';
                src: url('/Users/kawakatsuryouta/Downloads/Noto_Serif_JP/NotoSerifJP-Regular.otf') format('opentype');
                font-weight: normal;
                font-style: normal;
            }
    
        h1 {
            font-size: 2.5em;
            text-align: center;
            /*margin-bottom: 85px;*/
            font-family: 'Noto Serif JP', serif;
        }
        
        h2, h3, h4, h5 {
            margin-top: 18px;
            margin-left:10px;
            font-size: 20px;
            border-left: 7px solid #ff0033;
            
        }


        .register submit:hover {
            background-color: #b5b1b1;
        }
        
        .week select, .period input, .name input{
           
            
            width: 75%;       /* フィールドを親要素の幅いっぱいに広げる */
            padding: 10px;     /* フィールドの内部にパディングを追加する */
            font-size: 1em;    /* フォントサイズを調整する */
            margin-bottom: 15px; /* 各フィールドの間にマージンを追加する */
            margin-left:30px;
            height: auto;  /* 必要に応じて高さを自動調整 */
            border: 1px solid #848484;  /* フィールドの境界線をわかりやすくする */
            
        }
        
        
         
        
        .register input {
            display: block;
            width: 40%;  /* フォームの最大幅 */
            margin: 0 auto; 
            margin-top: 100px;
            padding: 10px;
            font-size: 1em;
            background-color:#ffe6eb;
        }
        
        .back{
                text-align: right;
                margin-right: 150px;
                margin-top: 60px;
                margin-bottom:50px;
                text-decoration:underline;
            
        }
        
        /*.timetable_excluded label {*/
        /*    font-size: 15px;*/
        /*    margin-left: 30px;*/
        /*    margin-top: 60px;*/
            
        /*}*/
        
        .timetable_excluded{
            padding-top: 40px;
            padding-left: 30px;
            padding-bottom: 13px;
        }
        
        .timetable_excluded label{
            font-size: 18px;
        }
        
        
        </style>
        
   
        <form action="/subject_store" method="POST">
               @csrf

            <div class="timetable_excluded">
                
                <input type="checkbox" name="subject[timetable_excluded]" value="1">
                <label for="timetable_excluded">この科目を時間割外として登録する</label>
            </div>
            
            <div class="name">
                <h3>&nbsp; 科目名</h3>
                <input type="text" name='subject[name]' placeholder="科目名" value="{{ old('subject.name') }}">
            </div>

            <div class="week">
                <h2>&nbsp; 曜日</h2>
                <select name="week_id">
                    @foreach($weeks as $week)
                        <option value="{{ $week->id }}">{{ $week->name }}</option>
                    @endforeach
                </select>
            </div>
            
           
            
            <div class='period'>
                <h4>&nbsp; 時限</h4>
                <input type="number" name='subject[period]' placeholder="n" value="{{ old('subject.period') }}">
            </div>
                
            
                
            <div class="register">
                <input type="submit" value="登録">
            </div>
        </form>
        <div class="back">
                <a href="{{ route('index') }}">トップに戻る</a>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $('input[name="subject[timetable_excluded]"]').change(function(){
                if($(this).is(':checked')){
                    $('.week').hide();
                    $('.period').hide();
                }else{
                    $('.week').show();
                    $('.period').show();
                }
                
                });
            });
        </script>
    </x-slot>
</x-app-layout>
