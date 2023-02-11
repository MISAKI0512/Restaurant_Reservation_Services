@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

<x-slot name="logo">
    <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </a>
</x-slot>
<div class="login-wrap p10">
    <div class="lh30">
        サインアップありがとうございます。<br>本webサイトを使用する前に、ご登録いただいたメールアドレスに確認メールを送らせていただいておりますので<br>
        そちらからメールアドレスの認証をお願いいたします。<br>メールが届いていない場合は左下のメール再送ボタンから再度お送りします。
        </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 red">
            {{ __('登録時に入力されたメールアドレスに、新しい認証リンクが送信されました。') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-button>
                    メール再送
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                ログアウト
            </button>
        </form>
    </div>
</div>
@endsection
