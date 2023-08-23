@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div id="main" class="layout-column flex" style="position: absolute; height: 100vh; margin-left: auto; width: 100%; margin-right: auto;">
    <div class="chakra-container-page3" style="overflow: auto; height: 100vh;">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex flex-row-reverse pad-l-r">
                
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/img/page2/logout button.png') }}" style="height: 25px;">
                </a>
                <img class="img-fluid mr-10" src="{{ url('/img/page2/user.png') }}" style="height: 25px; ">
                <img class="img-fluid mr-10" src="{{ url('/img/page2/ai.png') }}" style="height: 25px; ">
                <img class="img-fluid mr-10" src="{{ url('/img/page2/home icon.png') }}" style="height: 25px; ">
                
                

            </div>
            <div class="text-center">
                <div class="box-height-15"></div>
                <div class="text-center">
                    <a href="#">
                        <img class="img-fluid" src="{{ url('/img/page2/text god of สูครอันดับ 1.png') }}" style="height: 40px; ">
                    </a>
                </div>
                <div class="box-height-10"></div>
                <div class="bg_top_10game">
                    <div class="autoplay" style="padding-top: 35px">
                        @if(isset($game))
                        @foreach($game as $u)
                        <img class="img-fluid p-10" src="{{ url('images/game/room/'.$u->room_image) }}"/>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <a href="#">
                        <img class="img-fluid" src="{{ url('/img/page2/เลือกค่ายเกมที่ต้องสแกน.png') }}" style="height: 40px; ">
                    </a>
                </div>
                <div class="box-height-10"></div>
                <div class="card-body">
                <div class="row" >
            
                @if(isset($objs))
                @foreach($objs as $u)

                    <div class="col-6 col-6-new ">
                        <div class="text-center">
                            @if($u->cat_id == 1)

                            <a href="{{ url('rooms_slot?casino='.$u->game_name_short) }}">
                                <img class="img-fluid" src="{{ url('images/game/game/'.$u->game_image) }}">
                                <img class="img-fluid" src="{{ url('/home/assets/img/page3/Click-Now.png') }}" style="height: 20px; margin-top: 0px;">
                            </a>

                            @else

                            <a href="{{ url('rooms?casino='.$u->game_name_short) }}">
                                <img class="img-fluid" src="{{ url('images/game/game/'.$u->game_image) }}">
                                <img class="img-fluid" src="{{ url('/home/assets/img/page3/Click-Now.png') }}" style="height: 20px; margin-top: 0px;">
                            </a>

                            @endif
                            
                        </div>
                    </div>

                @endforeach
                @endif
                    
                </div>
                </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>

$('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
});

</script>

@stop('scripts')