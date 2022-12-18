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
    <div class="search">
      <div class="select-wrap">
        <select name="area" class="select-css">
          <option hidden>All area</option>
          @foreach(config('pref') as $pref_id => $name)
          <option value="{{ $pref_id }}">{{ $name }}</option>
          @endforeach
        </select>
      </div>
      <div class="select-wrap">
        <select name="genre" class="select-css ml0">
          <option hidden>All genre</option>
          <option value="1">焼肉</option>
        </select>
      </div>
      <div class="select-wrap">
        <input type="text" class="search-text" placeholder="Search…">
      </div>
    </div>
  </nav>
  <div class="shop-index-wrap">
    <div class="card">
      <div class="card_img">
        <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="card">
      </div>
      <div class="card_content">
        <h2 class="card_content-ttl">仙人</h2>
        <span class="card_content_tag">
          <p class="card_content_tag_item">#東京都</p>
          <p class="card_content_tag_item">#寿司</p>
        </span><br>
        <div class="flex justify-between">
          <button class="blue-btn w50" type="submit">詳しく見る</button>
          <input type="checkbox" name="like" value="1" id="like"> <label for="like" class="heart"></label>
        </div>
      </div>
    </div>
  </div>
</div>