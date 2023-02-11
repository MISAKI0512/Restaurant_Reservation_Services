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