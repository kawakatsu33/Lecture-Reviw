<x-guest-layout>
    <x-slot name="header">
       <h1>講義アタックEX</h1>
     </x-slot>
    <!-- Session Status -->
    <div class="flex-center">
        <div class="form-container">

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="login-form">
            ログインフォーム
        </div>
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('パスワードを覚える') }}</span>
            </label>
        </div>
        
          
        
        <div class="flex items-center justify-end mt-4">
            
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れましたか?') }}
                </a>
            @endif
                
            <x-primary-button class="ml-3">
                {{ __('ログイン') }}
               
            </x-primary-button>
             
        </div>
        <a  class="underline text-align:right text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
            {{ __('新規登録') }}</a>
    </form>
    </div>
    </div>
    
    <style>
        h1{
            font-family: 'Noto Serif JP', serif;
            font-size: 3em;  /* 文字サイズを大きくする */
            text-align:center; /* 中央揃えにする */
            margin-top: 20px; 
        }
        body, html {
            height: 100%;
            margin: 0;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-container {
            width: 100%;
            max-width: 700px;
            margin: auto; /* 中央揃え */
            padding: 20px; /* 内側の余白を追加 */
        }
        
        .login-form{
            
        }
    </style>
    
</x-guest-layout>
