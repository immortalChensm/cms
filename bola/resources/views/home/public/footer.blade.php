<div class="foot-t">
    <div class="foot-t1">
        <img src="{{ URL::asset('home/img/logo03.jpg')}}"/>
        <span>@foreach($sys as $item)
                @if($item->name=='webtitle')
                    {{$item->value}}
                @endif
            @endforeach</span>
    </div>
    <div class="foot-t2">
        <img src="{{ URL::asset('home/img/adress.png')}}"/>
        <span>@foreach($sys as $item)
                @if($item->name=='address')
                    {{$item->value}}
                @endif
            @endforeach</span>
    </div>
    <div class="foot-t3">
        <img src="{{ URL::asset('home/img/tel.png')}}"/>
        <span>@foreach($sys as $item)
                @if($item->name=='phone')
                    {{$item->value}}
                @endif
            @endforeach</span>
    </div>
</div>
<div class="foot-u fs14">
    <p>Copyright 2017  All Rights Reserved.</p>
    <p>@foreach($sys as $item)
            @if($item->name=='copyright')
                {{$item->value}}
            @endif
        @endforeach</p>
</div>
</div>
