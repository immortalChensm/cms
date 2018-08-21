var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
// 
// jQuery(".news").slide({mainCell:".bd ul",autoPlay:false,delayTime:1000});

$(function()
{

    


     $(window).resize(function(){
            var h = $(window).height();
            var w = $(window).width();
            if(w<720)
            {
              $(".header1").css({display:"block"});
              $(".other").css({display:"block"});
              $(".header").css({display:"none"});
              $(".hg_bg").css({display:"block"});
              $(".s_01").css({display:"none"});
              $(".all_banner1").css({display:"block"});
              $(".all_banner").css({display:"none"});

            }else
            {
              $(".header1").css({display:"none"});
              $(".other").css({display:"none"});
              $(".hg_bg").css({display:"none"});
              $(".s_01").css({display:"block"});
              $(".header").css({display:"block"});
              $(".all_banner1").css({display:"none"});
              $(".all_banner").css({display:"block"});
            }
        });
   var screen = $(window).width();
   if(screen<720)
   {
     $(".header").css({display:"none"});
     $(".header1").css({display:"block"});
     $(".all_banner1").css({display:"block"});
     $(".all_banner").css({display:"none"});
     $(".other").css({display:"block"});
     $(".hg_bg").css({display:"block"});
     $(".s_01").css({display:"none"});
   }
    new WOW().init();

    $(".hg_kc .kc_r li").mouseover(function()
    {
      $(this).find("p").css({display:"block"});
    })
   $(".hg_kc .kc_r li").mouseout(function()
    {
       $(this).find("p").css({display:"none"});
    })

   $(".news_main2 li").mouseover(function()
   {
      $(this).find("font").css({color:"#fff"});
      $(this).find("span").css({color:"#fff"});
      $(this).find("b").css({background:"#fff"});
      $(this).find("b").css({color:"#6b6b6b"});
   })
    $(".news_main2 li").mouseout(function()
   {
      $(this).find("font").css({color:"#000000"});
      $(this).find("span").css({color:"#6b6b6b"});
      $(this).find("b").css({background:"#B1AEA9"});
      $(this).find("b").css({color:"#fff"});
   })

   // $(".hg_news .news_r li").mouseover(function()
   // {
   //    $(this).find(".m_tit").css({color:"#fff"});
   //    $(this).find(".m_ljgd").css({color:"#fff"});
   // })
   //  $(".hg_news .news_r li").mouseout(function()
   // {
   //    $(this).find("p").css({color:"#000000"});
   //    $(this).find("span").css({color:"#6b6b6b"});
   // })
   
   $(".header-btn").click(function()
   {
      if($(this).attr("menu-open") === "true")
      {
        $(this).attr("menu-open","false");
          $(".enum").slideDown();
      }
      else
      {
        $(this).attr("menu-open","true");
        $(".enum").slideUp()
      }
   })

   $(".ab_tab .tit a").click(function()
   {
    $('.db').css({display:"block"});
    $('.db1').css({display:"none"});
   })
   $(".ab_tab .tit1 a").click(function()
   {
    $('.db').css({display:" none"});
    $('.db1').css({display:"block"});
   })

  
})