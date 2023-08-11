@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div id="main" class="layout-column flex" style="position: absolute;    margin-left: auto; width: 100%; margin-right: auto;">
    <div class="chakra-container-page3">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <div class="d-flex flex-row-reverse pad-l-r">
                
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/home2/page3/ล็อคเอ้าท์.png') }}" style="height: 30px; width:85px;">
                </a>
            </div>
            <div class="text-center">
            <a href="{{ url('/welcome') }}">
                <img class="img-fluid logo_website_slot" src="{{ url('/home/assets/img/home2/logo_app2.png') }}">
            </a>
                
                <div class="text-center">
                    <a href="#">
                        <img class="img-fluid" src="{{ url('/home/assets/img/home2/page2/เลือกค่ายที่ต้องการใช้สูตร.png') }}" style="height: 36px; width:240px ">
                        <p class="text-yello-p3">เลือกค่ายเกมส์ที่ต้องการสแกน</p>
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

@stop('scripts')