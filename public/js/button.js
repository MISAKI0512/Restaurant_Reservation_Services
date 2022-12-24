$(".open-btn").click(function ()
{
  $(this).toggleClass('active');
  $("#g-nav").toggleClass('panelactive');
});

$('#g-nav a').click(function () {
    $(".open-btn").removeClass('active');
    $("#g-nav").removeClass('panelactive');
});