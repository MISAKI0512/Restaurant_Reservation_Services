@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

    </nav>
    <div class="login-wrap">
        <p class="f-large lh40 text-center bold pt60">ご予約ありがとうございます</p>
        <div class="mt20 text-center pb60">
            <button class="blue-btn plr10"><a href="{{ route('index') }}">
                {{ __('戻る') }}
            </a></button>
        </div>
    </div>
</div>
@endsection