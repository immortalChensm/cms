/**
 * Created by wsx on 2018/8/29.
 */
//加载头部尾部
    // $(function(){
    //     $('#header').load('header.html');
    //     $('#footer').load('footer.html');
    // });
    // 
   //搜索框下拉显示隐藏
    $(function(){
        $(".search_main .arrow_down").mouseover(function(){
            $(".searchTab").css('display','block');
        })
        $(".searchTab").mouseleave(function(e){
            //if(e.currentTarget.className == "search_li") return;
            $(".searchTab").css('display','none');
        })
    });

   //首页轮播图
    $(function(){
        var timer=null;
        var index=0;
        $("ol>li").click(function(){
            index=$(this).index();
            Tab(index);
        });
        $(".wrapper").hover(function(){
            clearInterval(timer);
        },function(){
            timer=setInterval(function(){
                index++;
                index%=$(".wrapper ul>li").length;
                Tab(index);
            },2000);
        }).trigger("mouseout");
        function Tab(num){
            $(".wrapper ol>li").eq(num).addClass("current").siblings().removeClass("current");
            $(".wrapper ul>li").eq(num).stop().fadeIn(50).siblings().stop().fadeOut(50);
        }
    });

    //首页选项卡
    $(function () {
        $(".wrapper_tab>.tab li").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
            $(".products>ul.main").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
        })
    });

