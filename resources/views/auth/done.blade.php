@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')
<div class="container">
    <nav class="nav lh40">
        <div class="flex">
        <div class="flex">
            <div class="open-btn"><span></span><span></span><span></span></div>
            <nav id="g-nav">
                <ul>
                    <li><a href="/">Home</a></li>  
                    <li><a href="/register">Registration</a></li>  
                    <li><a href="/login">Login</a></li>  
                </ul>
            </nav>
            <h1 class="title ml20">Rese</h1>
        </div>
    </nav>
    <div class="login-wrap">
        <p class="f-large lh40 text-center bold pt60">会員登録ありがとうございます</p>
        <div class="mt20 text-center pb60">
            <button class="blue-btn plr10"><a href="{{ route('login') }}">
                {{ __('login') }}
            </a></button>
        </div>
    </div>
</div>
@endsection