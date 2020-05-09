$(function(){
  var pagetop = $('#page_top');
  // ボタン非表示
  pagetop.hide();

  // 80px スクロールしたらボタン表示
  $(window).scroll(function () {
     if ($(this).scrollTop() > 80) {
          pagetop.fadeIn();
     } else {
          pagetop.fadeOut();
     }
  });
  pagetop.click(function () {
     $('body, html').animate({ scrollTop: 0 }, 500);
     return false;
  });
});

// 以下ふわっと要素

$(function(){
   var effect_pos = 500; // 画面下からどの位置でフェードさせるか(px)
   var effect_move = 50; // どのぐらい要素を動かすか(px)
   var effect_time = 800; // エフェクトの時間(ms) 1秒なら1000

   // フェードする前のcssを定義
   $('.scroll-fade').css({
       opacity: 0,
       transform: 'translateY('+ effect_move +'px)',
       transition: effect_time + 'ms'
   });

   // スクロールまたはロードするたびに実行
   $(window).on('scroll load', function(){
       var scroll_top = $(this).scrollTop();
       var scroll_btm = scroll_top + $(this).height();
       effect_pos = scroll_btm - effect_pos;

       // effect_posがthis_posを超えたとき、エフェクトが発動
       $('.scroll-fade').each( function() {
           var this_pos = $(this).offset().top;
           if ( effect_pos > this_pos ) {
               $(this).css({
                   opacity: 1,
                   transform: 'translateY(0)'
               });
           }
       });
   });
});