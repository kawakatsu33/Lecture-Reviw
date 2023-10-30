<x-app-layout>
    <x-slot name="header">
        <h1>科目登録</h1> 
    </x-slot>
    <x-slot name="content">
        <style>
        
        h1 {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 85px;
        }
        
        h2, h3, h4 {
            margin-bottom: 10px;
            font-size: 20px;
        }


        .register submit:hover {
            background-color: #e8e8e8;
        }
        
        .week select, .period input, .name input {
           
            
            width: 100%;       /* フィールドを親要素の幅いっぱいに広げる */
            padding: 10px;     /* フィールドの内部にパディングを追加する */
            font-size: 1em;    /* フォントサイズを調整する */
            margin-bottom: 10px; /* 各フィールドの間にマージンを追加する */
            height: auto;  /* 必要に応じて高さを自動調整 */
            border: 1px solid #ccc;  /* フィールドの境界線をわかりやすくする */
        }
        
         
        
        .register input {
            display: block;
            width: 40%;  /* フォームの最大幅 */
            margin: 0 auto; 
            margin-top: 100px;
            padding: 10px;
            font-size: 1em;
        }
        
        .back{
            text-align: right;
            margin-right: 150px;
            margin-top: 80px;
            
        }
        </style>
        
   
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
                    <h4>時限</h4>
                    <input type="number" name='subject[period]' placeholder="n" value="{{ old('subject.period') }}">
                </div>
                
                <div class="register">
                    <input type="submit" value="登録">
                </div>
            </form>
        <div class="back">
                <a href="{{ route('index') }}">トップに戻る</a>
        
        </div>

    </x-slot>
</x-app-layout>
