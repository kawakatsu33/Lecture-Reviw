<x-app-layout>
    <x-slot name="header">
        <h1>講義登録</h1> 
    </x-slot>
    <x-slot name="content">
        <style>
        
            h1 {
                font-size: 2.5em;
                text-align: center;
                margin-bottom: 50px;
            }
            
            h2, h3, h4 {
                margin-bottom: 10px;
                font-size: 20px;
            }
    
    
            .register submit:hover {
                background-color: #e8e8e8;
            }
            
            .name input, .times input {
               
                
                width: 100%;       /* フィールドを親要素の幅いっぱいに広げる */
                padding: 10px;     /* フィールドの内部にパディングを追加する */
                font-size: 1em;    /* フォントサイズを調整する */
                margin-bottom: 10px; /* 各フィールドの間にマージンを追加する */
                height: auto;  /* 必要に応じて高さを自動調整 */
                border: 1px solid #ccc;  /* フィールドの境界線をわかりやすくする */
            }
            
            .body textarea {
                 width: 100%;       /* フィールドを親要素の幅いっぱいに広げる */
                padding: 10px;     /* フィールドの内部にパディングを追加する */
                font-size: 1em;    /* フォントサイズを調整する */
                margin-bottom: 10px; /* 各フィールドの間にマージンを追加する */
                height: 150px;  /* 必要に応じて高さを自動調整 */
                border: 1px solid #ccc;  /* フィールドの境界線をわかりやすくする */
            }
            
            .register input {
                display: block;
                width: 40%;  /* フォームの最大幅 */
                margin: 0 auto; 
                margin-top: 75px;
                padding: 10px;
                font-size: 1em;
            }
            
            .back{
                text-align: right;
                margin-right: 150px;
                margin-top: 60px;
                
            }
        </style>

        
           
           
            <form action="/lectures/store" method="POST" enctype="multipart/form-data">     
               @csrf
               
               <input type="hidden" name="subject_id" value="{{ $subject }}">

               
               <div class="name">
                    <h2>講義名</h2>
                    <input type="text" name='lecture[name]' placeholder="講義名（任意）" value="{{ old('lecture.name') }}">
                </div>
                
                <div class='times'>
                    <h3>講義回</h3>
                    <input type="number" name='lecture[times]' placeholder="n" value="{{ old('lecture.times') }}.回目">
                </div>
                
                <div class='body'>
                    <h4>Note</h4>
                    <textarea name="lecture[body]" placeholder="What did you do?">{{ old('lecture.body') }}</textarea>
                </div>
                
                <div class="pdf">
                    <h5>PDFアップロード</h5>
                    <input type="file" name="pdf">
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
