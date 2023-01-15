<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="application-name" content="Application">
        <title>Rese</title>
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        @yield('css')
    </head>
    <body>
        <div class="container">
            <div class="flex">
                <h1 class="title">Rese</h1>
            @yield('main')
        </div>
    </body>