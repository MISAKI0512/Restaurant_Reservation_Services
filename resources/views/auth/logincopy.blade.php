@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

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