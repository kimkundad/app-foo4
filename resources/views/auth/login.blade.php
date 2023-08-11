@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex" style="position: absolute;    margin-left: auto; width: 100%; margin-right: auto;">
    <div class="chakra-container">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <img class="img-fluid logo_website2" src="{{ url('/home/assets/img/home2/logo_app2.png') }}">
            <form method="POST" id="myForm" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="card-body">

                @if ($message = Session::get('expired'))
                <div class="d-flex">
                    <div class="alert alert-warning" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                        <span class="mx-2">อายุใช้งานของคุณหมด กรุณาติดต่อเจ้าหน้าที่</span>
                    </div>
                </div>
                @endif

                @error('username')
                <div class="text-center">
                <span class="invalid-feedback" role="alert">
                    <strong>ไม่พบยูสเซอร์เนมหรือพาสเวิร์ดผิด </strong>
                </span>
                </div>
                @enderror

                    <div class="d-flex">
                        <div style="height: 70px;">
                            <img class="img-fluid img-input" src="{{ url('/home/assets/img/home2/page1/ปุ่ม-ยูสเซอร์.png') }}" style="">
                            <input type="text" class="form-control-img"  name="username" value="{{ old('username') }}" required >
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex">
                        <div style="height: 70px;">
                            <img class="img-fluid img-input" src="{{ url('/home/assets/img/home2/page1/ปุ่ม-พาสเวิร์ด.png') }}" style="">
                            <input type="password" class="form-control-img"  name="password" required >
                            <div class="box-height-10"></div>
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex justify-content-center">
                        <a href="#" onclick="myFunction()" ><img class="img-fluid" src="{{ url('/home/assets/img/home2/page1/ปุ่ม-LOGIN.png') }}" style="height: 50px;"></a>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="d-footer">
       
            <div class="chakra-container-f">
                <div class="bg-footer">
                    <div class="d-flex justify-content-between">
                        <a class="nav-footer-a">
                            <img class="img-fluid" src="{{ url('/home/assets/img/home2/page1/icon-หน้าแรก.png') }}" style="height: 36px; width:36px;">
                            <p class="chakra-text-footer">หน้าแรก</p>
                        </a>
                        <a href="{{ get_line_url() }}" class="nav-footer-a" target="_blank">
                            <img class="img-fluid" src="{{ url('/home/assets/img/home2/page1/icon-สมัคร.png') }}" style="height: 36px; width:36px;">
                            <p class="chakra-text-footer">สมัครสมาชิก</p>
                        </a>
                    </div>
                </div>
                <a href="{{ get_banner_url() }}">
                    <img class="img-fluid" src="{{ url('media/'.get_banner_img()) }}">
                </a>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    <script>
        function myFunction() {
            document.getElementById("myForm").submit();
        }
</script>

@stop('scripts')