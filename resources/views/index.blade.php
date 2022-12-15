@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/index.css">
@endsection

@section('main')
<div class="container">
  <nav class="nav">
    <div class="center">
      <div class="flex">
        <div class="btn">
          <span class="hamburger"></span>
        </div>
        <h1 class="title ml20">Rese</h1>
      </div>
    </div>
    <div class="search">
      <div class="select-wrap">
        <select name="area" class="select-css">
          <option hidden>All area</option>
          <option value="1">東京都</option>
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
</div>