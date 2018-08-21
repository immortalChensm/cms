<script src="{{ URL::asset('home/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('home/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ URL::asset('home/js/swiper.min.js') }}"></script>
<script src="{{ URL::asset('home/js/my.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    $(function(){
        var mySwiper = new Swiper ('.swiper-container', {
            autoplay: 10000,
            loop: true,
            paginationClickable: true,
            pagination: '.swiper-pagination'
        });
        $(document).scroll(function(){
            if($(this).scrollTop() > 80){
                if(!$('.mynav').hasClass('mynav-scroll')){
                    $('.mynav').addClass('mynav-scroll');
                }
                if(!$('.dropdown-menu').hasClass('dropdown-scroll')){
                    $('.dropdown-menu').addClass('dropdown-scroll');
                }
            }else{
                if($('.mynav').hasClass('mynav-scroll')){
                    $('.mynav').removeClass('mynav-scroll');
                }
                if($('.dropdown-menu').hasClass('dropdown-scroll')){
                    $('.dropdown-menu').removeClass('dropdown-scroll');
                }
            }
        });
    });
</script>