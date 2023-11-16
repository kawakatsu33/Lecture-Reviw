<x-app-layout>
    
    <x-slot name="content">
        <style>
            h1 {
            font-family: 'Noto Serif JP', serif;
            font-size: 3em;  /* 文字サイズを大きくする */
            text-align:center; /* 中央揃えにする */
            margin-top: 20px;  /* 上部に余白を追加 */
             }
        
            .user_info_block h3, .user_courses h3 {
                margin-top: 20px;
                margin-bottom: 0; /* この値を必要に応じて調整 */
                font-weight: bold;
                font-size: 1.5em;
                margin-left:20px;
            }
            .user_courses {
                margin-top:65px;
            }
        
            .user_info_block table, .user_courses table {
                width: 100%;
                margin-top:0px;
                border-collapse: collapse;
            }
            .user_info_block th,.user_courses th {
                width:15%;
                border: 1px solid #ddd;
                padding: 13px;
                text-align: center;
            }
            
            .user_info_block td,.user_courses td{
                width:70%;
                border: 1px solid #ddd;
                padding: 13px;
                text-align: left;
            }
            
            .user_info_block th, .user_courses th {
                background-color: #FBEFF8;
            }
            
            .user_info_block td, .user_courses td {
                background-color: #FFFFFF;
            }
           
           .back{
                text-align: right;
                margin-right: 150px;
                margin-top: 60px;
                text-decoration:underline;
           }
           
        </style>


        <div class="user_info_block">
            
            <table>
               <h3>[アカウント情報]</h3> 
                <tr>
                    
                    <th>アカウント名</th>
                        <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                        <td>{{ Auth::user()->email }}</td>
                
                </tr>
            </table>
        </div>
        
        <div class="user_courses">
            
            <table>
                <h3>[講義情報]</h3>
                <tr>
                    <th>登録した講義数:</th>
                    <td>{{ $lecturesCount }}</td>
                </tr>
                <tr>
                    <th>理解度別講義数</th>
                    <td>
                        理解していない: {{ $lecturesCountByLevel[1] ?? '0' }}<br>
                        あまり理解していない: {{ $lecturesCountByLevel[2] ?? '0' }}<br>
                        ほどほどに理解している: {{ $lecturesCountByLevel[3] ?? '0' }}<br>
                        ある程度理解した: {{ $lecturesCountByLevel[4] ?? '0' }}<br>
                        完璧: {{ $lecturesCountByLevel[5] ?? '0' }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="back">
                <a href="{{ route('index') }}">トップに戻る</a>
            </div>
</x-slot>
</x-app-layout>
