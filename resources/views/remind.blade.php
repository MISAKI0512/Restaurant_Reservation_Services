{{ $name }}様<br>
<br>
おはようございます。
この度は{{ $reservation->shop->name }}にご予約いただき、誠にありがとうございます。<br>
ご予約日となりましたため、お知らせいたします。<br>

{{ $name }}様のご予約内容は以下の通りです。<br>
<br>
店舗名:{{ $reservation->shop->name }}<br>
日時:{{ $reservation->start_at->format('Y年m月d日 G:i') }}<br>
ご予約人数:{{ $reservation->num_of_users }}名様<br>
<br>

ご来店時には下記QRコードを店舗スタッフに提示していただけますと<br>
大変スムーズですので、ご協力よろしくお願いいたします。<br>
<br>
{{   QrCode::generate(route('qrcode',['user_id' => $reservation->user->id, 'shop_id' => $reservation->shop->id ]))  }}<br>
<br>
{{ $name }}様のご来店を{{ $reservation->shop->name }}店舗スタッフ一同、心よりお待ち申し上げます。
