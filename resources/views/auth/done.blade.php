@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/index.css">
@endsection

@section('main')
<div class="container">
    <nav class="nav lh40">
        <div class="flex">
            <div class="btn">
                <span class="hamburger"></span>
            </div>
            <h1 class="title ml20">Rese</h1>
        </div>
    </nav>
    <div class="login-wrap">
        <p class="f-large lh40 text-center bold pt60">会員登録ありがとうございます</p>
        <div class="mt20 text-center pb60">
            <button class="blue-btn plr10"><a href="{{ route('login') }}">
                {{ __('ログインする') }}
            </a></button>
        </div>
    </div>
</div>
@endsection