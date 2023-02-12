@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@section('main')
</nav>
<h2 class="user_name">{{ $user->name }}さん</h2>
<div class="mypage-reserve-wrap">
  <div class="reservation_status_wrap">
    <p class="medium bold">予約状況</p>
    @if($reservations->isNotEmpty())
    @foreach($reservations as $reservation)
    <form action="{{ route('reserve.update') }}" method="post" id="change">@csrf</form>        
      <input type="hidden" name="id" value="{{ $reservation->id }}" form="change">
      <div class="reserves-wrap mt10">
        <div class="flex justify-between">
          <div class="flex">
            <img src='../jpg/clock icon.jpg' class="clock-icon">
            <p class="f-c-white small lh25 ml20">予約{{ $loop->iteration }}</p>
          </div>
          <form action="{{ route('reserve.delete', ['id' => $reservation->id]) }}" method="post"  class="reserve-delete-icon" id="delete">
          @csrf
            <button class="reserve-delete" form="delete"></button>
          </form>
        </div>
        <div class="flex mt10">
          <p class="f-c-white small lh20 w25">Shop</p>
          <p class="f-c-white small lh20">{{ $reservation->shop->name }}</p>
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Date</p>
          <input name="date" class="input_blue small lh20" value="{{ $reservation->start_at->format('Y/m/d') }}" form="change">
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Time</p>
          <input name="time" class="input_blue small lh20" Value="{{ $reservation->start_at->format('h:i')}}" form="change">
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Number</p>
          <p class="f-c-white small lh20">{{ $reservation->num_of_users }}</p>
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Course</p>
          @if($reservation->course_id==null)
          <p class="f-c-white small lh20">席のみ予約</p>
          @else
          <p class="f-c-white small lh20">{{ $reservation->course->name }}</p>
          @endif
        </div>
        <div class="justify-end">
          <button class="change-btn" form="change">変更</button>
        </div>
      </div>
    @endforeach
    @else
    <p class="medium mt10">予約情報がありません。</p>
    @endif
    <p class="medium bold mt20">ご利用履歴</p>
    @if($reserved->isNotEmpty())
    @foreach($reserved as $reserve)
      <div class="reserves-wrap mt10">
        <div class="flex justify-between">
          <div class="flex">
            <img src='../jpg/clock icon.jpg' class="clock-icon">
            <p class="f-c-white small lh25 ml20">履歴{{ $loop->iteration }}</p>
          </div>
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
          <p class="f-c-white small lh20">{{ $reserve->start_at->format('h:i') }}</p>
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Number</p>
          <p class="f-c-white small lh20">{{ $reserve->num_of_users }}</p>
        </div>
        <div class="flex">
          <p class="f-c-white small lh20 w25">Course</p>
          @if($reserve->course_id==null)
          <p class="f-c-white small lh20">席のみ予約</p>
          @else
          <p class="f-c-white small lh20">{{ $reserve->course->name }}</p>
          @endif
        </div>
        <div class="review-wrap">
          <form action="{{ route('review.create')}}"  method="post" id="review {{ $loop->iteration }}">
          @csrf
            <p class="f-c-white small lh20">評価</p>
            <div class="rate-form">
              <input id="star5" type="radio" name="star" value="5" form="review {{ $loop->iteration }}">
              <label for="star5">★</label>
              <input id="star4" type="radio" name="star" value="4" form="review {{ $loop->iteration }}">
              <label for="star4">★</label>
              <input id="star3" type="radio" name="star" value="3" form="review {{ $loop->iteration }}">
              <label for="star3">★</label>
              <input id="star2" type="radio" name="star" value="2" form="review {{ $loop->iteration }}">
              <label for="star2">★</label>
              <input id="star1" type="radio" name="star" value="1" form="review {{ $loop->iteration }}">
              <label for="star1">★</label>
            </div>
            @error('star')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <p class="f-c-white small lh20">コメント</p>
            <textarea name="comment" class="w95" form="review {{ $loop->iteration }}">{{ old('comment') }}</textarea>
            @error('comment')
            <p class="error-text">{{ $message }}</p>
            @enderror
            <div class="justify-end">
              <button type="submit" class="submit-btn mr10" form="review {{ $loop->iteration }}" >送信</button>
            </div>
            <input type="hidden" name="shop_id" value={{ $reserve->shop->id }} form="review {{ $loop->iteration }}">
          </form>
        </div>
      </div>
    @endforeach
    @else
    <p class="medium mt10">ご利用履歴がありません。</p>
    @endif
  </div>
  <div class="favorite_shop_wrap w60">
    <p class="favorite_text">お気に入り店舗</p>
    <div class="Favorite_shop">
      @if($likes->isNotEmpty())
      @foreach($likes as $shop)
      <div class="card_w50">
        <div class="card_img">
          <img src="{{ asset('storage/shop_image/' . $shop->shop->name . '.jpg') }}" alt="shop-photo">
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
@endsection