<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="application-name" content="Application">
        <title>Rese</title>
        <link rel="stylesheet" href="css/reset.css">
        @yield("css")
    </head>
    <body>
        @yield('main')
    </body>