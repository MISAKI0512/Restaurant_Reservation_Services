@extends('layouts.adminBase')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('admin')
  <h1 class="ml20 lh40">店舗責任者ページ</h1>
@endsection

@section('main')
<h2 class="mt30">登録店舗</h2>
  <Form class="flex justify-between mt20" id="change" method="post" action="?">
  @csrf
  <table class="mt10">
    <tr>
      <th>
        店舗名
      </th>
      <td>
        @if(!empty($shops))
        <input type="text"  class="w100" name="name" value="{{ $shops->name }}">
        @else
        <input type="text" class="w100" name="name" placeholder="店舗名">
        @endif
      </td> 
    </tr>
    <tr>
      <th>
          店舗責任者
      </th>
      <td>
        @if(!empty($shops))
        <input type="text" class="w100" name="manager_name" value="{{ $shops->user->name }}">
        @else
        <input type="text" class="w100" name="manager_name" placeholder="店舗責任者">
        @endif
      </td>
    </tr>
    <tr>
      <th>
        登録メールアドレス
      </th>
      <td>                  
        @if(!empty($shops))
          <input type="text" class="w100" name="manager_email" value="{{ $shops->user->email }}">
        @else
          <input type="text" class="w100" name="manager_email" placeholder="メールアドレス">
        @endif
      </td>
    </tr>
    <tr>
      <th>
        イメージ写真URL
      </th>
      <td>
        @if(!empty($shops))
          <input type="text" class="w100" name="image_url" value="{{ $shops->image_url }}">
        @else
          <input type="text" class="w100" name="image_url" placeholder="イメージ画像URL">
        @endif
      </td>
    </tr>
    <tr>
      <th>
        店舗エリア
      </th>
      <td>
        @if(!empty($shops))
          <select name="area_id">
            @foreach($areas as $area)
              <option {{$shops->isSelectedArea($area->id) }} value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
          </select>
        @else
          <select name="area_id">
            @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
          </select>
        @endif
      </td>
    </tr>                 
    <tr>
      <th>
        店舗ジャンル
      </th>
      <td>
        @if(!empty($shops))
          <select name="genre_id" form="change">
            @foreach($genres as $genre)
              <option {{$shops->isSelectedGenre($genre->id) }} value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        @else
          <select name="genre_id" form="change">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        @endif
      </td>
    </tr>
    <tr>
      <th>
        店舗紹介文
      </th>
      <td>
        @if(!empty($shops))
          <textarea class="w100" rows="5" name="description"> {{ $shops->description }}</textarea>
          @else
          <textarea class="w100" rows="5" name="description" placeholder="店舗紹介文"></textarea>
          @endif
      </td>
    </tr>          
  </table>
  @if(!empty($shops))
    <button type="submit" formaction="{{ route('shop_admin.update', ['id' => $shops->id]) }}" method="post" class="ml10">変更</button>
  @else
    <button type="submit" formaction="{{ route('shop_admin.create') }}" method="post" class="ml10">登録</button>
  @endif
</form>
<h2 class="mt30">予約状況</h2>
  @if($reservations->isNotempty())
    @foreach($reservations as $reservation)
    <div class="reservation-wrap mt15 ptb10 pl20">
      <p class="f-c-white small lh20 rem4">予約{{ $loop->count }}</p>
      <div class="flex">
        <p class="f-c-white small lh20 rem4">Date</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('Y/m/d') }}</p>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem4">Time</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('h:i')}}</p>
      </div>
      <div class="flex justify-between">
        <div class="flex">
          <p class="f-c-white small lh20 rem4">Number</p>
          <p class="f-c-white small lh20">{{ $reservation->num_of_users }}</p>
        </div>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem4">予約名</p>
        <p class="f-c-white small lh20">{{ $reservation->user->name}}</p>
      </div>
    </div>
    @endforeach
  @else
    <p>予約がありません</p>
  @endif
@endsection