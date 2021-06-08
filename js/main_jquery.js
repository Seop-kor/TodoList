$(document).ready(function() {
  $(".intro").lightSlider({
    item: 1,
    pager: false,
    loop: true,
    slideMargin: 0,
    speed: 500,
    auto: true,
    pause: 7000,
    mode: 'fade',
  });   
  $(".each-btns button").on('click', function() {
    const idx = $(this).index();
    $(".each-btns button").removeClass("active");
    $(this).addClass("active");
  });
});