<x-app-layout>
    <x-slot name="header">
        <h1>講義編集</h1> 
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
                
                
                font-family: 'Noto Serif JP', serif;
            }
            
            h2, h3, h4 {
                margin-top: 18px;
                margin-left:10pxx;
                font-size: 20px;
                border-left: 7px solid #ff0033;
            }
    
    
            .register submit:hover {
                background-color: #e8e8e8;
            }
            
            .times input, .understanding select {
               
                
                width: 15%;       
                padding: 10px;     
                font-size: 1em;   
                margin-bottom: 30px; 
                margin-left:30px;
                height: auto;  
                border: 1px solid #848484;  
            }
            
            .name input{
                 width: 65%;       
                padding: 10px;     
                font-size: 1em;   
                margin-bottom: 30px; 
                margin-left:30px;
                height: auto;  
                border: 1px solid #848484;  
            }
            
            
            .body textarea {
                 width: 95%;       
                padding: 10px;    
                font-size: 1em;   
                margin-bottom: 10px; 
                margin-left:30px;
                height: 150px;  
                border: 1px solid #848484;
            }
            
            .register input {
                display: block;
                width: 30%;  
                margin: 0 auto; 
                margin-top: 75px;
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
        
        </style>
        
    
        
           
           
           <form action="/lectures/{{ $lecture->id }}" method="POST">
               @csrf
               @method('PUT')
               

               
               <div class="name">
                    <h2>&nbsp; 講義名</h2>
                    <input type="text" name='lecture[name]'  value="{{ $lecture->name }}">
                </div>
                
                <div class='times'>
                    <h3>&nbsp; 講義回</h3>
                    <input type="number" name='lecture[times]'  value="{{ $lecture->times }}">
                </div>
                
                <div class='understanding'>
                    <h3>&nbsp; 理解度</h3>
                        <select name='level'>
                            <option value="">選択してください</option>
                            <option value="1" {{ (old('level', $lecture->understanding->level ?? null) == '1') ? 'selected' : '' }}>1: 理解していない</option>
                            <option value="2" {{ (old('level', $lecture->understanding->level ?? null) == '2') ? 'selected' : '' }}>2: あまり理解していない</option>
                            <option value="3" {{ (old('level', $lecture->understanding->level ?? null) == '3') ? 'selected' : '' }}>3: ほどほどに理解している</option>
                            <option value="4" {{ (old('level', $lecture->understanding->level ?? null) == '4') ? 'selected' : '' }}>4: ある程度理解した</option>
                            <option value="5" {{ (old('level', $lecture->understanding->level ?? null) == '5') ? 'selected' : '' }}>5: 完璧</option>
                        </select>
                    </div>
                
                <div class='body'>
                    <h4>&nbsp; Note</h4>
                    <textarea name="lecture[body]">{{ $lecture->body }}</textarea>
                    
                </div>
                
                @if($lecture->pdf_path)
    <div class="existing-pdf">
        <h5>既存のPDFファイル</h5>
        <a href="{{ Storage::url($lecture->pdf_path) }}" target="_blank">ファイルを表示</a>
        <!-- ここに削除ボタンを追加する場合 -->
    </div>
@endif

<!--<div class="pdf-display">-->
<!--    <h5>&nbsp; PDFアップロード</h5>-->
<!--    <input type="file" name="pdf">-->
<!--</div>-->

                </div>
                
                <div class="register">
                    <input type="submit" value="編集実行">
                </div>
            </form>
            <div class="back">
                <a href="{{ route('index') }}">トップに戻る</a>
            </div>
    </x-slot>
</x-app-layout>
