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
        <div class="login-back">
            <p class="f-large f-c-white">Registration</p>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="p20">
            @csrf

            <!-- Name -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/user.jpg')}}" class="email-icon">
                <x-input id="name" class="login-input" type="text" name="name" :value="old('name')" required autofocus placeholder="Username"/>
            </div>

            <!-- Email Address -->
            <div class="flex mt20">
                <x-label for="email"/>

                <x-input id="email" class="login-input" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="flex mt20">
                <x-label for="password"/>

                <x-input id="password" class="login-input"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="flex mt20">
                <x-label for="password_confirmation"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection