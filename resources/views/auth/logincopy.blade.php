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
        <div class="login-back">
            <p class="f-large f-c-white">Login</p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }} " class="p20">
            @csrf

            <!-- Email Address -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/mail.jpg')}}" class="email-icon">
                <x-input id="email" class="login-input" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
            </div>

            <!-- Password -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/pass.jpg')}}" class="email-icon">
                <x-input id="password" class="login-input"
                                type="password"
                                name="password"
                                required autocomplete="current-password" 
                                placeholder="password" />
            </div>
            <div class="justify-end mt20">
                <x-button class="blue-btn w30">
                    {{ __('ログイン') }}
            </x-button>
            </div>
        </form>
    </div>
</div>
    @endsection