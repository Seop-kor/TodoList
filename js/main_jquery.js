$(document).ready(function () {
  $(".intro").lightSlider({
    item: 1,
    pager: false,
    loop: true,
    slideMargin: 0,
    speed: 500,
    auto: true,
    pause: 7000,
    mode: "fade",
  });
  $(".each-btns button").on("click", function () {
    $(".each-btns button").removeClass("active");
    $(this).addClass("active");
  });
  $(".board-btns button").on('click', function() {
    $(".board-btns button").removeClass("active");
    $(this).addClass("active");
  });
  $(".mobile-menu").on('click', function(){
    $(this).toggleClass("active");
    if($(this).hasClass("active")){
      $(this).next().removeClass("hide");
      $(this).next().addClass("show");
    }else{
      $(this).next().removeClass("show");
      $(this).next().addClass("hide");
    }
  });
});