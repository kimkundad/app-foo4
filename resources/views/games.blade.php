@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

<style>

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(33%, 1fr));
  gap: 2rem;
  padding: 0;
  list-style-type: none;
}

.card {
  position: relative;
  display: block;
  height: 100%;  
  border-radius: calc(15 * 1px);
  overflow: hidden;
  text-decoration: none;
}

.card__image {      
  width: 100%;
  height: auto;
}

.card__overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;      
  border-radius: calc(40 * 1px);    
  background-color: var(--surface-color);      
  transform: translateY(100%);
  transition: .2s ease-in-out;
}

.card:hover .card__overlay {
  transform: translateY(0);
}

.card__header {
    position: relative;
    display: flex;
    align-items: center;
    padding: 5px 5px;
    border-radius: calc(18 * 1px) 0 0 0;
    background-color: #f0a83e;
    transform: translateY(-100%);
    transition: .2s ease-in-out;
}

.card__arc {
  width: 80px;
  height: 80px;
  position: absolute;
  bottom: 100%;
  right: 0;      
  z-index: 1;
}

.card__arc path {
    fill: #f0a83e;
    d: path("M 40 80 c 40 0 40 -14 40 -40 v 40 Z");
}      

.card:hover .card__header {
  transform: translateY(0);
}

.card__thumb {
  flex-shrink: 0;
  width: 30px;
  height: 30px;      
  border-radius: 50%;      
}

.card__title {
  font-size: 12px;
  margin: 0 0 .3em;
  color: #fff;
}

.card__tagline {
  display: block;
  margin: 1em 0;
  font-family: "MockFlowFont";  
  font-size: .8em; 
  color: #D7BDCA;  
}

.card__status {
  font-size: .8em;
  color: #D7BDCA;
}

.card__description {
  padding: 0 2em 2em;
  margin: 0;
  color: #D7BDCA;
  font-family: "MockFlowFont";   
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
}    
.card__header-text{
    margin-left: 5px;
}
</style>

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
                <!-- <div class="row" >
            
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
                    
                </div> -->

                <ul class="cards">

                @if(isset($objs))
                @foreach($objs as $u)
                <li>
                    <a href="{{ url('rooms_slot?casino='.$u->game_name_short) }}" class="card">
                    <img src="{{ url('images/game/game/'.$u->game_image) }}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>     
                        <img class="card__thumb" src="{{ url('images/game/game/'.$u->game_image) }}" alt="{{$u->game_name}}" />
                        <div class="card__header-text">
                            <h3 class="card__title">{{$u->game_name}}</h3>    
                        </div>
                        </div>
                    </div>
                    </a>      
                </li>
                @endforeach
                @endif

                </ul>

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