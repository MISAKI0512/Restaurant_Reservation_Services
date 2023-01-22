{{ $reservation -> user -> name }}様 予約内容<br>
店舗名:{{ $reservation -> shop -> name }}<br>
日時:{{ $reservation -> start_at -> format('Y年m月d日 G:i') }}<br>
ご予約人数:{{ $reservation -> num_of_users }}名様<br>
