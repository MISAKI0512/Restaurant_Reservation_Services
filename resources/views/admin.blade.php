@extends('layouts.adminBase')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('main')
    <h1 class="ml20 lh40">管理者ページ</h1>
</div>
    <div class="login-wrap">
        <div class="login-back">
            <p class="f-large f-c-white">店舗登録</p>
        </div>
        <form method="POST" action="{{ route('admin.create') }}" class="p20" novalidate>
            @csrf
            <!-- ユーザーrole -->
            <input type="hidden" name="role" value="1">

            <!-- ShopName -->
            <div class="flex mt20">
                <img src="{{ asset('jpg/ショップアイコン4.jpeg')}}" class="icon">
                <input class="login-input " type="name" name="name" :value="old('name')" required autofocus placeholder="Shop Manager name"/>
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
    <div class="shopList-wrap">
        <h3>登録店舗一覧</h3>
        @if(!empty($shop_owners))
            <table class="mt10">
                <tr>
                    <th>
                        店舗名
                    </th>
                    <th>
                        店舗責任者
                    </th>
                    <th>
                        メールアドレス
                    </th>
                    <th>
                        登録日
                    </th>
                </tr>
                @foreach($shop_owners as $shop_owner)
                <tr>
                    <td>
                        {{ $shop_owner->name }}
                    </td>
                    <td>
                        {{ $shop_owner->user->name }}
                    </td>
                    <td>
                        {{ $shop_owner->user->email }}
                    </td>
                    <td>
                        {{ $shop_owner->created_at }}
                    </td>
                </tr>
                @endforeach
            </table>
        @else
        <p class="mt10">店舗が未登録です。</p>
        @endif
    </div>
@endsection