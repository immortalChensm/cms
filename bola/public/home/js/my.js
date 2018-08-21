/**
 * Created by Administrator on 2017/4/14 0014.
 */
/**
 * Created by Administrator on 2017/4/7 0007.
 */
var Winheight=$(window).height();
var Winwidth=$(window).width();
$(function () {

    $(window).resize(function () {

        about_right();
        footer();
        fixed_top();
        join_right();
        goTop();
        var prize_right = Winwidth * 0.4 -$(".i_right .wenz p").width();
        $(".content").css("height", Winheight);
        $(".i_left").css("height", Winheight);
        $(".i_right").css("height", Winheight);
        $(".content .work_more").css("bottom","50px");
        $(".i_right").css("padding-top", 0.2 * Winheight);
        $(".slide3 .i_right").css("padding-top", 0.17 * Winheight);
        $(".i_right.padding20").css("padding-top", 0.18 * Winheight);
        $(".prize").css({"right": prize_right - 35});
        $(".service").css({"right": prize_right-20});
        $(".index_2").css("top", Winheight * 0.32);

    });

    about_right();
    footer();
    fixed_top();
    join_right();
    goTop();
    var prize_right = Winwidth * 0.4 - $(".i_right .wenz p").width();
    $(".content").css("height", Winheight);
    $(".i_left").css("height", Winheight);
    $(".i_right").css("height", Winheight);
    $(".i_right").css("padding-top", 0.2 * Winheight);
    $(".content .work_more").css("bottom","50px");
    $(".slide3 .i_right").css("padding-top", 0.17 * Winheight);
    $(".i_right.padding20").css("padding-top", 0.20 * Winheight);
    $(".prize").css({"right": prize_right - 35});
    $(".service").css({"right": prize_right-20});
    $(".index_2").css("top", Winheight * 0.22);
	
	$('.mynav').find('a:contains("关于博拉")').on('click', function(){
		window.location.href = $(this).attr('href');
	});
	$('.mynav').find('a:contains("业务体系")').on('click', function(){
		window.location.href = $(this).attr('href');
	});
});


//顶部导航
function fixed_top() {
	if($(window).width() < 1000){
		$('.nav').on('click', function(){
			if($('.nav>ul').hasClass('ani-show')){
				$('.nav>ul').removeClass('ani-show');
				$('.nav>ul').addClass('ani-hide');
			}else{
				$('.nav>ul').removeClass('ani-hide');
				$('.nav>ul').addClass('ani-show');
			}
		});
		
	}else{
		$(".nav .nav_list").each(function (i) {
			$(this).hover(function () {
				$(this).find(".nav_bot").slideDown(300).siblings(".nav_bot").slideUp(100);
				$(this).addClass("hover");
			}, function () {
				$(this).find(".nav_bot").slideUp(100);
				$(this).removeClass("hover");
			});
		});

		$(".nav .nav_list").each(function (i) {
			$(this).click(function () {
				$(this).addClass("active").siblings().removeClass("active");
			});
		});
	}
	
	$('.i-nav').html($('.navbar-collapse').html());
	$('.i-nav').find('*').removeClass('nav navbar-nav navbar-right dropdown dropdown-toggle dropdown-menu');
	$('.i-nav').find('*').removeAttr('data-toggle data-hover');

    $('#iNav').off('click');
    $('#iNav').on('click', function(){
        if($('.i-nav').hasClass('collapsing-in')){
            console.log("111");
            $('.i-nav').removeClass('collapsing-in');
            $('.i-nav').addClass('collapsing-out');
        }else{
            console.log("222");
            $('.i-nav').addClass('collapsing-in');
            $('.i-nav').removeClass('collapsing-out');
        }
    });
	// $('#iNav').on('click',function () {
	//     if($("#iNav").attr("data-attr")==1){
	//         console.log("111");
     //        $("#iNav").attr("data-attr",0);
     //        $('.i-nav').addClass('collapsing-in');
     //        $('.i-nav').removeClass('collapsing-out');
     //    }else {
     //        console.log("222");
     //        $("#iNav").attr("data-attr",1);
     //        $('.i-nav').removeClass('collapsing-in');
     //        $('.i-nav').addClass('collapsing-out');
     //    }
    //
    // })
}

//底部
function footer() {
    $(".footer .left a").each(function (i) {
        $(this).hover(function () {
            $(this).find("img").attr("src","images/bot_ir"+(i+2)+".png");
        }, function () {
            $(this).find("img").attr("src","images/bot_i"+(i+2)+".png");
        })
    })
    // if($(".new_detail").height()<Winheight){
    //     $(".footer").addClass("fixed");
    // }else {
    //     $(".footer").removeClass("fixed");
    // }
}

//关于博拉右导航
function about_right() {
    right=(Winwidth-1280)/2;
    $(".about_right").css("right",right);
    $(".about_right ul li").each(function (i) {
        $(this).click(function () {
            $(this).addClass(".active").siblings().removeClass(".active");
        })
    });
}

//加入博拉右导航，业务体系
function join_right() {
    right=(Winwidth-1550)/2;
    if(Winwidth<=1600){
        right=(Winwidth-1280)/2;
    }
    // $(".join_right").css("right",right);
    $("#system_right").css("right",right);
    $(".join_right ul li").each(function (i) {
        $(this).click(function () {
            $(this).addClass(".active").siblings().removeClass(".active");
        })
    });
}


//goTOP
function goTop() {
    // $("body").append('<img src="images/top.png" class="gotop" id="gotop"/>');
    $(window).scroll(function () {
        if($(window).width()>1000){
            if($(window).scrollTop()>600){
                $("#gotop").addClass("showT");
            } else{
                $("#gotop").removeClass("showT");
            }
        }

    });
    $("#gotop").click(function(){
        $('body,html').animate({scrollTop:0},500);
        return false;
    });
}
