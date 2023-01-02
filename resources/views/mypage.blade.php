@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')

  </nav>
  <h2 class="user_name">{{ $user->name }}さん</h2>
  <div class="flex justify-between mt30">
    <div class="Reservation_status_wrap w30">
      <p class="medium bold">予約状況</p>
        @if($reserves->isNotEmpty())
          @foreach($reserves as $reserve)
          <div class="reserves-wrap p20 mt10">
            <div class="flex justify-between">
              <div class="flex">
                <img src='../jpg/clock.jpg' class="clock-icon">
                <p class="f-c-white small lh25 ml20">予約{{ $reserve->id }}</p>
              </div>
              <form action="{{ route('reserve.delete', ['id' => $reserve->id]) }}" method="post"  class="reserve-delete-icon">
              @csrf
                <button class="reserve-delete"></button>
              </form>
            </div>
            <div class="flex mt10">
              <p class="f-c-white small lh20 w25">Shop</p>
              <p class="f-c-white small lh20">{{ $reserve->shop->name }}</p>
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
    <div class="Favorite_shop_wrap w60">
      <p class="medium bold">お気に入り店舗</p>
      <div class="Favorite_shop">
        @if(isset($favorite))
          @foreach($shops as $shop)
          <div class="card">
            <div class="card_img">
              <img src="{{ $shop->image_url }}" alt="shop-photo">
            </div>
            <div class="card_content">
              <p class="card_content-ttl">{{ $shop->name }}</p>
              <span class="card_content_tag">
                <p class="card_content_tag_item">#{{ $shop->area->name }}</p>
                <p class="card_content_tag_item">#{{ $shop->genre->name }}</p>
              </span><br>
              <div class="flex justify-between">
                <button class="blue-btn w50 mt20" type="submit" ><a href="{{ route('detail',['shop_id'=>$shop->id ]) }}" class="f-c-white">詳しく見る</a></button>
                @auth
                <input type="checkbox" name="like" value="1" id="like"> <label for="like" class="heart"></label>
                @endauth
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>



</div>
@endsection