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
        <form action="{{ route('reserve.update') }}" method="post">
        @csrf
          <input type="hidden" name="id" value="{{ $reserve->id }}">
          <div class="reserves-wrap mt10">
            <div class="flex">
              <img src='../jpg/clock.jpg' class="clock-icon">
              <p class="f-c-white small lh25 ml20">予約{{ $loop->iteration }}</p>
            </div>
            <form action="{{ route('reserve.delete', ['id' => $reserve->id]) }}" method="post"  class="reserve-delete-icon">
            @csrf
              <button class="reserve-delete"></button>
            </form>
            <div class="flex mt10">
              <p class="f-c-white small lh20 w25">Shop</p>
              <p class="f-c-white small lh20">{{ $reserve->shop->name }}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Date</p>
              <input name="date" class="input_blue small lh20" value="{{ $reserve->start_at->format('Y/m/d') }}">
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Time</p>
              <input name="time" class="input_blue small lh20" Value="{{ $reserve->start_at->format('h:i')}}">
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 w25">Number</p>
              <input name="num_of_users" class="input_blue small lh20" Value="{{ $reserve->num_of_users }}">
            </div>
            <div class="justify-end">
              <button class="change-btn">変更</button>
            </div>
            <div class="content justify-end mt10">
                <form action="{{ asset('charge') }}" method="POST">
                    {{ csrf_field() }}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-amount="1000"
                                    data-name="Stripe Demo"
                                    data-label="決済をする"
                                    data-description="Online course about integrating Stripe"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-currency="JPY">
                            </script>
                </form>
            </div>
          </div>
        </form>
        @endforeach
      @else
      <p class="medium mt10">予約情報がありません。</p>
      @endif
    </div>
    <div class="Favorite_shop_wrap w60">
      <p class="medium bold">お気に入り店舗</p>
      <div class="Favorite_shop">
        @if($likes->isNotEmpty())
          @foreach($likes as $shop)
          <div class="card_w50">
            <div class="card_img">
              <img src="{{ $shop->shop->image_url }}" alt="shop-photo">
            </div>
            <div class="card_content">
              <p class="card_content-ttl">{{ $shop->shop->name }}</p>
              <span class="card_content_tag">
                <p class="card_content_tag_item">#{{ $shop->shop->area->name }}</p>
                <p class="card_content_tag_item">#{{ $shop->shop->genre->name }}</p>
              </span><br>
              <div class="flex justify-between">
                <button class="blue-btn w50 mt20" type="submit" >
                <a href="{{ route('detail',['shop_id'=>$shop->shop->id ]) }}" class="f-c-white">詳しく見る</a></button>
                <a href="{{ route('favorite.delete',['id'=>$shop->shop->id]) }}" class="heart-bg-red"></a>
              </div>
            </div>
          </div>
          @endforeach
        @else
        <p class="medium mt10">お気に入り店舗が登録されてません。</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection