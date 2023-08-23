@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

<style>
    .col-4-new {
    padding-right: 2px !important;
    padding-left: 2px !important;
    min-height: 90px;
    margin-bottom: 15px;
}
</style>

@stop('stylesheet')

@section('content')


<div id="main" class="layout-column flex" style="position: absolute; height: 100vh; margin-left: auto; width: 100%; margin-right: auto;">
    <div class="chakra-container-page3" style="overflow: auto; height: 100vh;">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>

            <div class="d-flex justify-content-between pad-l-r">

                <a href="{{ url('welcome/') }}">
                    <img class="img-fluid" src="{{ url('/img/page3/select provider -button.png') }}" style="height: 23px;" />
                </a>
                <div class="d-flex justify-content-center">
                    <img class="img-fluid mr-5x" src="{{ url('/img/page2/home icon.png') }}" style="height: 23px; ">
                    <img class="img-fluid mr-5x" src="{{ url('/img/page2/ai.png') }}" style="height: 23px; ">
                    <img class="img-fluid mr-5x" src="{{ url('/img/page2/user.png') }}" style="height: 23px; ">
                </div>
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/img/page2/logout button.png') }}" style="height: 23px;">
                </a>
                
                
                
            </div>


            {{-- <div class="d-flex justify-content-between pad-l-r">
                <a href="{{ url('welcome/') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/home2/page3/เลือกค่าย.png') }}" style="height: 30px; width:85px;" />
                </a>
                <a href="{{ url('/logout') }}">
                    <img class="img-fluid" src="{{ url('/home/assets/img/home2/page3/ล็อคเอ้าท์.png') }}" style="height: 30px; width:85px;">
                </a>
            </div> --}}

            <style>
                .position_detail_romm{
                    position: relative;
                }
                .item_detail_romm{
                    top: 55px;
                    left: 47%;
                    transform: translate(-10%, 0);
                    position: absolute;
                }
                .item_detail_romm2{
                    top: 55px;
                    left: 35%;
                    transform: translate(-10%, 0);
                    position: absolute;
                }
                .text-white-p5 {
                    font-size: 13px;
                    margin-top: -28px;
                    color: black;
                }
                .text-online-p5 {
                font-size: 12px;
            }
            </style>
            @php

            $now = time(); // or your date as well
            $your_date = strtotime(Auth::user()->birthday);
            $datediff = $your_date - $now;
            $sumday = round($datediff / (60 * 60 * 24));

            $time1 = new DateTime(Auth::user()->birthday);
            $time2 = new DateTime(date("Y-m-d H:i"));
            $interval = $time1->diff($time2);
            @endphp
            <div class="box-height-30"></div>
            
            <div class="position_detail_romm">
              
                    <img class="img-fluid" src="{{ url('img/page3/bg_base_tineonline.png') }}" style=" ">
                    
                    <p class="text-white-p5 item_detail_romm2">เหลือระยะเวลาอีก : {{ $sumday }} วัน</p>
                    <div class="item_detail_romm">
                    <p class="text-online-p5" id="online-user"> 0 : USER ONLINE</p>
                    </div>
            </div>
            
                <div class="card-body" style="padding: 10px 6px 80px 6px;">
                    
                    <style>
                        .gameName-p6{
                            margin-top: -8px
                        }
                        .winrate{
                            font-size: 10px;
                        }
                        .funcx{
                            text-align: end;
                            margin-top: -3px;
                            margin-right: -5px;
                            color: #fff;
                            font-size: 8px;
                            z-index: 99;
                            position: relative;
                        }
                        .logo_gamesx{
                            margin-left: -5px;
                            height: 30px;
                            width: 30px;
                        }
                        .classfunc{
                            position: relative;
                            z-index: 1;
                            margin-top: -50px;
                            width: 25px;
                            height: 25px;
                        }
                    </style>

                    <div class="d-flex justify-content-around flex-wrap">

                        @if(isset($objs))
                        @foreach($objs as $u)
                        <div class=" col-4-new">

                            @php
                            
                            @endphp
                            <div class="text-center">
                                <a href="#">
                                    <div class="bg-game-slot" style="width: 122px; height:88px; padding: 8px 7px 12px 7px; }}');">
                                        <p class="gameName-p6">{{ $u->room }} </p>
                                        <div class="d-flex justify-content-between" style="margin-top:0px">
                                            <img src="{{ url('images/game/room/'.$u->room_image) }}" style="width: 50px; height: 52px; border-radius: 5px; padding-top:5px">
                                            <div class="text-center" style="height: 50px;">
                                                <p class="winrate"> อัตราการชนะ </p>
                                                <p class="percen_winrate" id="room-percent-{{ $u->id }}"> {{ $u->percent }}% </p>
                                                <p class="funcx" id="freeroom-percent-{{ $u->id }}"> ฟังก์ชั่นซื้อฟีเจอร์ </p>
                                                <div class="text-left">
                                                    <img src="https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun6.png" id="imgroom-percent-{{ $u->id }}" class="classfunc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <img src="{{ url('images/game/game/'.$game->game_image) }}" class="logo_gamesx">
                                        <div style="margin-top:11px; width: 90px; float:right; margin-right:-5px">
                                            <div class="" style=" ">
                                                <div id="xroom-percent-{{ $u->id }}" class="progress " style="height:12px; ">
                                                    <div class="progress-bar  gd-warning" data-toggle="tooltip" title="{{ $u->percent }}%" style="width: {{ $u->percent }}%"></div>
                                                </div>
                                                <p id="xxroom-percent-{{ $u->id }}" class="text-white-pre-p5">{{ $u->percent }}%</p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </a>
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

<script>
$(document).ready(function() {
randomPercent();
randomOnlinePercent();
      setInterval(function() {
        randomOnlinePercent();
        randomPercent();
      }, 60 * 1000);

      function randomPercent() {
      $.ajax("{{ url('/api_rooms_slot?casino='.$game->game_name_short) }}", {
        contentType: 'application/json',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          let roomIds = $("[id^='room-percent-']").map(function() {
            return this.id;
          }).get();

          for (var j = 0; j < data.length; j++) {
            console.log('data->',data[j].coin);
            $('#freeroom-percent-' + data[j].id).html('' + data[j].coin + '%');
            $('#imgroom-percent-' + data[j].id).attr("src", data[j].fname);
          }
          for (var i = 0; i < roomIds.length; i++) {
            let percent = getRandomInt(75,100)
            $('#' + roomIds[i]).html('' + percent + '%');
            $('#xx' + roomIds[i]).html('' + percent + '%');
            $('#x' + roomIds[i]).html('<div class="progress-bar  gd-warning" data-toggle="tooltip" title="' + percent + '%" style="width: ' + percent + '%"></div>');
          }
        },
      });
    }

    function randomOnlinePercent() {

        $("#online-user").html(getRandomInt(2500,5000) + ' : USER ONLINE');

    }

    function getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    });

</script>


@stop('scripts')