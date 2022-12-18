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
  <div class="flex justify-between">
    <div class="detail-wrap">
      <div class="flex mt100">
        <div class="back-btn"></div>
        <h2 class="shop-title ml10 pt5">仙人</h2>
      </div>
      <div class="shop-image mt30">
        <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="card">
      </div>
      <div class="flex shop-tag mt20">
        <p class="small mr10">#東京都</p>
        <p class="small mr10">#寿司</p>
      </div>
      <p class="small mt20 w90">料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。</p>
    </div>
    <div class="reserve-wrap">
      <div class="reserve-form">
        <h3 class="shop-title f-c-white mt30">予約</h3>
        <input type="date" name="date" value="2021-04-01" class="reserve-date mt20 w30"><br>
        <input type="time" name="time" value="10:00" class="reserve-time mt20" step="1800"><br>
        <select name="number" value="1人" class="reserve-number mt20 w100">
          <option value="1" selected="selected">1人</option>
          @for ($i = 2; $i <= 10; $i++)
          <option value="{{ $i }}">{{ $i }}人</option>
          @endfor
        </select>
      </div>
      <div>
        {{-- 予約があった場合の入力 --}}
      </div>
      <div>
        <button class="reserve-btn">予約する</button>
    </div>
  </div>
</div>
@endsection