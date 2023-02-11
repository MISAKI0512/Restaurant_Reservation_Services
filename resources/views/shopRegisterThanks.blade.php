@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')
</nav>
<div class="login-wrap">
    <p class="f-large lh40 text-center bold pt60">新規店舗の登録が完了しました。</p>
    <div class="mt20 text-center pb60">
        <button class="blue-btn plr10"><a href="{{ route('admin.index') }}">
            {{ __('登録店舗一覧へ') }}
        </a></button>
    </div>
</div>
@endsection