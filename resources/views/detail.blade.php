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
  <div class="flex justify-between">
    <div class="detail-wrap">
      <div class="flex mt100">
        <button class="back-btn" onclick="history.back()"></button>
        <h2 class="shop-title ml10 pt5">{{ $shops->name }}</h2>
      </div>
      <div class="shop-image mt30">
        <img src="{{ $shops->image_url }}" alt="card">
      </div>
      <div class="flex shop-tag mt20">
        <p class="medium mr10">#{{ $shops->area->name }}</p>
        <p class="medium mr10">#{{ $shops->genre->name }}</p>
      </div>
      <p class="medium mt20 w100 lh20">{{ $shops->description }}</p>
    </div>
    <form action="{{ route('reserve.create')}}" class="reserve-wrap" method="post">
      @csrf
      <input type="hidden" name="shop_id" value={{ $shops->id }}>
      <div class="reserve-form">
        <h3 class="shop-title f-c-white mt30">予約</h3>
        <input type="date" name="date" value="2021-04-01" class="reserve-date mt20 w30"><br>
        <input type="time" name="time" value="10:00" class="reserve-time mt20" step="1800"><br>
        <select name="num_of_users" value="1人" class="reserve-number mt20 w100">
          <option value="1" selected="selected">1人</option>
          @for ($i = 2; $i <= 10; $i++)
          <option value="{{ $i }}">{{ $i }}人</option>
          @endfor
        </select>
      </div>
      @if($reserves->shop_id == $shops->id )
      <div>
        <p>Shop</p>
      </div>
      @endif
      <div>
        <button class="reserve-btn">予約する</button>
      </div>
    </form>
  </div>
</div>
@endsection