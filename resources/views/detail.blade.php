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
        <img src="{{ asset('storage/shop_image/' . $shops->name . '.jpg') }}" alt="shop-photo">
      </div>
      <div class="flex shop-tag mt20">
        <p class="medium mr10">#{{ $shops->area->name }}</p>
        <p class="medium mr10">#{{ $shops->genre->name }}</p>
      </div>
      <p class="medium mt20 w100 lh20 ls">{{ $shops->description }}</p>
      <h3 class="mt10">■口コミ</h3>
      @if($reviews->isNotempty())
        @foreach($reviews as $review)
          <div class="reviewlist-wrap">
            <p class="medium lh20 ls">評価 {{ $review->star }}</p>
            <p class="medium lh20 ls">コメント</p>
            <p class="medium lh20 ls under-line">{{ $review->comment }}</p>
          </div>
        @endforeach
      @else
      <p class="mt10">口コミがありません。</p>
      @endif
    </div>
    <div class="reserve-wrap">
      <form  action="{{ route('reserve.create')}}"  method="post" id="reserve">@csrf</form>
      <input type="hidden" name="shop_id" value={{ $shops->id }} form="reserve">
      <div class="reserve-form">
        <h3 class="shop-title f-c-white mt30">予約</h3>
        <input type="date" name="date"  class="reserve-date mt15 w30" form="reserve"><br>
        @error('date')
        <p class="error-text">{{ $message }}</p>
        @enderror
        <input type="time" name="time"  class="reserve-time mt15" form="reserve"><br>
        @error('time')
        <p class="error-text">{{ $message }}</p>
        @enderror
        <select name="num_of_users" value="1人" class="reserve-number mt15 w100" form="reserve">
          <option value="" selected disabled>人数</option>
          @for ($i = 1; $i <= 10; $i++)
          <option value="{{ $i }}">{{ $i }}人</option>
          @endfor
        </select>
        @error('num_of_users')
        <p class="error-text">{{ $message }}</p>
        @enderror
        @if(!empty($reserves))
          @foreach($reserves as $reserve)
          <div class="reservation-wrap mt15 ptb10 pl20">
            <div class="flex">
              <p class="f-c-white small lh20 rem4">Shop</p>
              <p class="f-c-white small lh20">{{ $shops->name }}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 rem4">Date</p>
              <p class="f-c-white small lh20">{{ $reserve->start_at->format('Y/m/d') }}</p>
            </div>
            <div class="flex">
              <p class="f-c-white small lh20 rem4">Time</p>
              <p class="f-c-white small lh20">{{ $reserve->start_at->format('h:i')}}</p>
            </div>
            <div class="flex justify-between">
              <div class="flex">
                <p class="f-c-white small lh20 rem4">Number</p>
                <p class="f-c-white small lh20">{{ $reserve->num_of_users }}</p>
              </div>
              <div class="review-btn mr10">評価</div>
            </div>
            <div class="review-wrap">
              <form action="{{ route('review.create')}}"  method="post" id="review">
              @csrf
                <p class="f-c-white small lh20">評価</p>
                <div class="rate-form">
                  <input id="star5" type="radio" name="star" value="5" form="review">
                  <label for="star5">★</label>
                  <input id="star4" type="radio" name="star" value="4" form="review">
                  <label for="star4">★</label>
                  <input id="star3" type="radio" name="star" value="3" form="review">
                  <label for="star3">★</label>
                  <input id="star2" type="radio" name="star" value="2" form="review">
                  <label for="star2">★</label>
                  <input id="star1" type="radio" name="star" value="1" form="review">
                  <label for="star1">★</label>
                </div>
                <p class="f-c-white small lh20">コメント</p>
                <textarea name="comment" class="w90" form="review"></textarea>
                <div class="justify-end">
                  <button type="submit" class="submit-btn mr10" form="review">送信</button>
                </div>
                <input type="hidden" name="shop_id" value={{ $shops->id }} form="review">
              </form>
            </div>
          </div>
          @endforeach
        @endif
        <button type="submit" class="reserve-btn" form="reserve">予約する</button>
      </div>
    </div>  
  </div>
@endsection