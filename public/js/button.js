//ボタンをクリックしたらナビゲーション表示
$(".open-btn").click(function ()
{
  $(this).toggleClass('active');
  $("#g-nav").toggleClass('panelactive');
});

//ナビゲーション表示時にボタンを押したらナビゲーションクローズ
$('#g-nav a').click(function () {
    $(".open-btn").removeClass('active');
    $("#g-nav").removeClass('panelactive');
});


