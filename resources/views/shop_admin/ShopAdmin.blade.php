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
<h2 class="mt30">登録店舗</h2>
  <Form class="flex justify-between mt20" id="change" method="post" action="?" enctype="multipart/form-data">
  @csrf
  <table class="mt10">
    <tr>
      <th class="text-center">
        店舗名
      </th>
      <td>
        <input type="text"  class="w100" name="name" value="{{ old('name',$shops->name) }}">
        @error('name')
        <p class="error-text">{{ $message }}</p>
        @enderror
      </td> 
    </tr>
    <tr>
      <th class="text-center">
          店舗責任者
      </th>
      <td>
        <input type="text" class="w100" name="shop_master_name" value="{{ old('shop_master_name',$shops->user->name) }}">
        @error('shop_master_name')
        <p class="error-text">{{ $message }}</p>
        @enderror
      </td>
    </tr>
    <tr>
      <th class="text-center">
        登録メールアドレス
      </th>
      <td>                  
        <p><input type="text" class="w100" name="email" value="{{ $shops->user->email }}" disabled>
      </td>
    </tr>
    <tr>
      <th class="text-center">
        イメージ写真
      </th>
      <td>
        <input type="file" accept="image/*" class="w100" name="image_url">
        @if(!empty($shops->image_url))
        <img src="{{ asset('storage/shop_image/' . $shops->name . '.jpg') }}" class="w50">
        @endif
        @error('image_url')
        <p class="error-text">{{ $message }}</p>
        @enderror
      </td>
    </tr>
    <tr>
      <th class="text-center">
        店舗エリア
      </th>
      <td>
        <select name="area_id">
          @foreach($areas as $area)
          <option {{$shops->isSelectedArea($area->id) }} value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : ''}} > {{ $area->name }} </option>
          @endforeach
        </select>
      </td>
    </tr>                 
    <tr>
      <th class="text-center">
        店舗ジャンル
      </th>
      <td>
        <select name="genre_id" form="change">
          @foreach($genres as $genre)
          <option {{$shops->isSelectedGenre($genre->id) }} value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : ''}} >{{ $genre->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <th class="text-center">
        店舗紹介文
      </th>
      <td>
        <textarea class="w100" rows="5" name="description">{{ old('description', $shops->description) }}</textarea>
        @error('description')
        <p class="error-text">{{ $message }}</p>
        @enderror
      </td>
    </tr>          
    <tr>
      <th class="bottom-step">
      </th>
      <td class="bottom-step flex-end">
      <button type="submit" formaction="{{ route('shop_admin.update', ['id' => $shops->id]) }}" method="post" class="shop-btn">変更</button>
      </td>
    </tr>
  </table>
</form>
@endsection