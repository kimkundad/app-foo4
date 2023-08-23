@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div id="main" class="layout-column flex" style="position: absolute;  height: 100vh;  margin-left: auto; width: 100%; margin-right: auto;">
    <div class="chakra-container" style="height: 100vh;">
        <div id="content" class="flex ">
            <div class="box-height-20"></div>
            <img class="img-fluid logo_website2" src="{{ url('/img/god-of-slot-copy.png') }}">
            <div class="text-center">
                <img class="img-fluid" src="{{ url('/img/page1/text login_.png') }}" style="max-width:60%">
            </div>
            
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
                            <img class="img-fluid img-input" src="{{ url('/img/page1/login username _1.png') }}" style="">
                            <input type="text" class="form-control-img"  name="username" value="{{ old('username') }}" required >
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex">
                        <div style="height: 70px;">
                            <img class="img-fluid img-input" src="{{ url('/img/page1/password_1.png') }}" style="">
                            <input type="password" class="form-control-img"  name="password" required >
                            <div class="box-height-10"></div>
                        </div>
                    </div>
                    <div class="box-height-10"></div>
                    <div class="d-flex justify-content-center">
                        <a href="#" onclick="myFunction()" ><img class="img-fluid" src="{{ url('/img/page1/button login.png') }}" style="height: 35px;"></a>
                    </div>
                    
                </div>
            </form>
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