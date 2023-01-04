@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

    </nav>
    <div class="login-wrap">
        <div class="login-back">
            <p class="f-large f-c-white">Registration</p>
        </div>
        <form method="POST" action="{{ route('register.store') }}" class="p20" novalidate>
            @csrf

            <!-- Name -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/user.jpg')}}" class="icon">
                <input class="login-input " type="name" name="name" :value="old('name')" required autofocus placeholder="Username"/>
            </div>
            @error('name')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <!-- Email Address -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/mail.jpg')}}" class="icon">
                <input class="login-input" type="email" name="email" :value="old('email')" required placeholder="Email"/>
            </div>
            @error('email')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <!-- Password -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/pass.jpg')}}" class="icon">
                <input  class="login-input" type="password" name="password" :value="old('password')" required autocomplete="new-password" placeholder="Password"/>
            </div>
            @error('password')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <div class="justify-end mt20">
                <button class="blue-btn w50px" type="submit"> 登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection