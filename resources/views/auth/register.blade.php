@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')
<div class="container">
    <nav class="nav lh40">
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
            <p class="f-large f-c-white">Registration</p>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" /> 

        <form method="POST" action="{{ route('register.store') }}" class="p20">
            @csrf

            <!-- Name -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/user.jpg')}}" class="icon">
                <input class="login-input " type="name" name="name" :value="old('name')" required autofocus placeholder="Username"/>
            </div>

            <!-- Email Address -->
            {{-- <div class="flex mt20">
                <x-label for="email"/>

                <x-input id="email" class="login-input" type="email" name="email" :value="old('email')" required />
            </div> --}}
            <div class="flex mt20">
                <img src="{{ asset('jpg/mail.jpg')}}" class="icon">
                <input class="login-input" type="email" name="email" :value="old('email')" required placeholder="Email"/>
            </div>

            <!-- Password -->
            {{-- <div class="flex mt20">
                <x-label for="password"/>

                <x-input id="password" class="login-input"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div> --}}
            <div class="flex mt20">
                <img src="{{ asset('jpg/pass.jpg')}}" class="icon">
                <input  class="login-input" type="password" name="password" :value="old('password')" required autocomplete="new-password" placeholder="Password"/>
            </div>

            <div class="justify-end mt20">
                <button class="blue-btn w50px" type="submit"> 登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection