@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

  </nav>
  <div class="flex justify-between">
    <div class="detail-wrap">
      <div class="flex mt80">
        <button class="back-btn" onclick="location.href='/'"></button>
        <h2 class="shop-title ml10 pt5">{{ $shops->name }}</h2>
      </div>
      <div class="shop-image mt20">
        <img src="{{ $shops->image_url }}" alt="card">
      </div>
      <div class="flex shop-tag mt20">
        <p class="medium mr10">#{{ $shops->area->name }}</p>
        <p class="medium mr10">#{{ $shops->genre->name }}</p>
      </div>
      <p class="medium mt20 w100 lh20 ls">{{ $shops->description }}</p>
    </div>
    <form action="{{ route('reserve.create')}}" class="reserve-wrap" method="post">
      @csrf
      <input type="hidden" name="shop_id" value={{ $shops->id }}>
      <div class="reserve-form">
        <h3 class="shop-title f-c-white mt30">予約</h3>
        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="reserve-date mt15 w30"><br>
        <input type="time" name="time" value="10:00" class="reserve-time mt15"><br>
        <select name="num_of_users" value="1人" class="reserve-number mt15 w100">
          <option value="1" selected="selected">1人</option>
          @for ($i = 2; $i <= 10; $i++)
          <option value="{{ $i }}">{{ $i }}人</option>
          @endfor
        </select>
        @if($reserves->isNotEmpty())
          @foreach($reserves as $reserve)
          <div class="reserves-wrap mt15 ptb10 pl20">
            <div class="flex">
              <p class="f-c-white small lh20 w25">Shop</p>
              <p class="f-c-white small lh20">{{ $shops->name }}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Date</p>
              <p class="f-c-white small lh20">{{ $reserve->start_at->format('Y/m/d') }}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Time</p>
              <p class="f-c-white small lh20">{{ $reserve->start_at->format('h:i')}}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Number</p>
              <p class="f-c-white small lh20">{{ $reserve->num_of_users }}</p>
            </div>
          </div>
          @endforeach
        @endif
      </div>
      <div>
        <button class="reserve-btn">予約する</button>
      </div>
    </form>
  </div>
</div>
@endsection