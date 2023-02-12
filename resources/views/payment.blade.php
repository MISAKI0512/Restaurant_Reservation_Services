@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('main')

</nav>
<div class="login-wrap p20 bg_blue">
    <p class="f-large lh40 bold f-c-white">ご予約確認</p>
    <form action="{{ route('charge') }}" method="POST">
    @csrf
        <table>
            <tr>
                <th>
                    予約店舗名
                </th>
                <td>
                    {{ $form['name'] }}
                </td>
            </tr>
            <tr>
                <th>
                    予約日時
                </th>
                <td>
                    {{ $form['date'] }}  {{ $form['time'] }}
                </td>
            </tr>
            <tr>
                <th>
                    予約人数
                </th>
                <td>
                    {{ $form['num_of_users'] }}
                </td>
            </tr>
            <tr>
                <th>
                    予約コース
                </th>
                <td>
                    @if($form['course']==null) 
                    席のみ予約
                    @else
                    {{ $form['course']->name }}
                    @endif
                </td>
            </tr>
            @if($form['course']!=null) 
            <tr>
                <th>
                    合計金額
                </th>
                <td>
                    &yen;{{ $form['price'] }}
                </td>
            </tr>
            @endif
        </table>
        <div class="flex justify-between">
            <button type="button" onClick="history.back()" class="change-btn ml10" >修正する</button>
            @if($form['course']!=null) 
            <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="{{ $form['price'] }}"
            data-name="Stripe Demo"
            data-label="決済をする"
            data-description="Online course about integrating Stripe"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
            </script>
            @else
            <button type="submit" class="change-btn ml10" >予約する</button>
            @endif
        </div>
        <input type="hidden" name="shop_id" value="{{ $form['shop_id'] }}">
        <input type="hidden" name="num_of_users" value="{{ $form['num_of_users'] }}">
        <input type="hidden" name="date" value="{{ $form['date'] }}">
        <input type="hidden" name="time" value="{{ $form['time'] }}">
        <input type="hidden" name="course_id" value="{{ $form['course_id'] }}">
    </form>
</div>
@endsection