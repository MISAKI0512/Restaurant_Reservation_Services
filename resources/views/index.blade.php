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
          @foreach($areas as $area)
          <option value="{{ $area->id }}">{{ $area->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="select-wrap">
        <select name="genre" class="select-css ml0">
          <option hidden>All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="select-wrap">
        <input type="text" class="search-text" placeholder="Search…">
      </div>
    </div>
  </nav>
  <div class="shop-index-wrap">
    @foreach($shops as $shop)
    <div class="card">
      <div class="card_img">
        <img src="{{ $shop->image_url }}" alt="card">
      </div>
      <div class="card_content">
        <h2 class="card_content-ttl">{{ $shop->name }}</h2>
        <span class="card_content_tag">
          <p class="card_content_tag_item">#{{ $shop->area->name }}</p>
          <p class="card_content_tag_item">#{{ $shop->genre->name }}</p>
        </span><br>
        <div class="flex justify-between">
          <button class="blue-btn w50 mt20" type="submit" ><a href="{{ route('detail',['shop_id'=>$shop->id]) }}" class="f-c-white">詳しく見る</a></button>
          <input type="checkbox" name="like" value="1" id="like"> <label for="like" class="heart"></label>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>