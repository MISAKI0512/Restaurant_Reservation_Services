@extends('layouts.shopadminBase')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('admin')
  <h1 class="ml20 lh40">店舗責任者ページ</h1>
@endsection

@section('main')
<h2 class="mt30">予約状況</h2>
  @if($reservations->isNotempty())
    @foreach($reservations as $reservation)
    <div class="reservation-wrap mt15 ptb10 pl20">
      <p class="f-c-white small lh20 rem5">予約{{ $loop->iteration }}</p>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">Date</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('Y/m/d') }}</p>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">Time</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('h:i')}}</p>
      </div>
      <div class="flex justify-between">
        <div class="flex">
          <p class="f-c-white small lh20 rem5">Number</p>
          <p class="f-c-white small lh20">{{ $reservation->num_of_users }}</p>
        </div>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">予約名</p>
        <p class="f-c-white small lh20">{{ $reservation->user->name}}</p>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">予約コース</p>
        <p class="f-c-white small lh20">{{ $reservation->course->name}}</p>
      </div>
    </div>
    @endforeach
  @else
  <p>予約がありません</p>
  @endif
  <h2 class="mt30">予約履歴</h2>
  @if($reserved->isNotempty())
    @foreach($reserved as $reservation)
    <div class="reservation-wrap mt15 ptb10 pl20">
      <p class="f-c-white small lh20 rem5">予約{{ $loop->iteration }}</p>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">Date</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('Y/m/d') }}</p>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">Time</p>
        <p class="f-c-white small lh20">{{ $reservation->start_at->format('h:i')}}</p>
      </div>
      <div class="flex justify-between">
        <div class="flex">
          <p class="f-c-white small lh20 rem5">Number</p>
          <p class="f-c-white small lh20">{{ $reservation->num_of_users }}</p>
        </div>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">予約名</p>
        <p class="f-c-white small lh20">{{ $reservation->user->name}}</p>
      </div>
      <div class="flex">
        <p class="f-c-white small lh20 rem5">予約コース</p>
        <p class="f-c-white small lh20">{{ $reservation->course->name}}</p>
      </div>
    </div>
    @endforeach
  @else
  <p>予約履歴がありません</p>
  @endif
@endsection