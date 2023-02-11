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
    <div class="bold mt20">メール(登録している全一般ユーザーに対してメールを送信します。)</div>
    <div class="mail-wrap">
        <form action="{{ route('mail.send')}}"  method="post">
        @csrf
            <p class="small lh20">タイトル</p>
            <input type="text" name="title">
            <p class="small lh20">本文</p>
            <textarea name="contents" class="w100" rows="10"></textarea><br>
            <button type="submit" class="submit-btn-black" >送信</button>
        </form>
    </div>

@endsection