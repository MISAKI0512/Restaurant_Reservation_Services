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
            <nav class="nav lh40">
                <div class="flex">
                    <div class="open-btn"><span></span><span></span><span></span></div>
                    <nav id="g-nav">
                    <ul>
                        @guest
                        <li><a href="/login">Login</a></li>  
                        @endguest
                        @auth
                        <li><a href="/admin">Admin-HOME</a></li> 
                        <li><a href="/admin/register">New Register</a></li> 
                        <li><a href="/admin/index">Shop Index</a></li> 
                        <li><a href="/logout">Logout</a></li>    
                        @endauth
                    </ul>
                    </nav>
                <h1 class="title ml20">Rese</h1>
                @yield('admin')
                </div>
            </nav>
        @yield('main')
        </div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/button.js') }}"></script>
    </body>