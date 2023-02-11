@extends('layouts.adminBase')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('admin')
    <h1 class="ml20 lh40">管理者ページ</h1>
@endsection

@section('main')
    <div class="login-wrap">
        <div class="login-back">
            <p class="f-large f-c-white">新規店舗登録</p>
        </div>
        <form method="POST" action="{{ route('admin.create') }}" class="p20" novalidate>
            @csrf
            <!-- ユーザーrole -->
            <input type="hidden" name="role" value="1">

            <!-- ShopName -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/ショップアイコン4.jpeg')}}" class="icon">
                <input class="login-input " type="name" name="name"  value="{{ old('name') }}"  placeholder="Shop name"/>
            </div>
            @error('name')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <!-- Shop_master_Name -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/user icon.jpg')}}" class="icon">
                <input class="login-input " type="name" name="shop_master_name"  value="{{ old('shop_master_name') }}" placeholder="Shop Master name"/>
            </div>
            @error('shop_master_name')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <!-- Email Address -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/mail icon.jpg')}}" class="icon">
                <input class="login-input" type="email" name="email" value="{{ old('email') }}"  placeholder="Email"/>
            </div>
            @error('email')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <!-- Password -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/password icon.jpg')}}" class="icon">
                <input  class="login-input" type="password" name="password"  value="{{ old('password') }}"  autocomplete="new-password" placeholder="Password"/>
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
@endsection