<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>金針花辨識系統</title>
    <link rel="icon" type="image/png" href="{{ asset('img/sunflower.png') }}" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/masonry-docs.css') }}" rel="stylesheet">
    <link rel=stylesheet href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="{{asset('css/croppie.css')}}" />
    <link href="{{ asset('css/rita_style.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/masonry-docs.min.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/bootstrap-waterfall.js') }}"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="{{asset('js/croppie.js')}}"></script>
    <script src="http://desandro.github.io/imagesloaded/imagesloaded.pkgd.min.js"></script>
    
<body  style="background-image: url(img/farm.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top;
            background-size: cover;">
<div >
    <div id="app" style="margin-top: 80px;">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#3770A9; padding: 10px">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 30px;color: #FFFFFF">
                        金針花辨識系統
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="background-color:#3770A9 ;font-size: 17px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li style="background-image: url(img/cccloud.png);width: 90px;height: 55px"><a href="{{ route('login') }}" style="color: #FFFFFF;padding:17px 23px"> Login</a></li>
                            </ul>
                            </nav>
                        @else
                        <li ><a a href="{{ url('/home') }}" style="color: #FFFFFF">瀏覽圖片</a></li>


                            <li class="nav-item"><a data-toggle="modal" data-target="#myModal" class="clickable" style="color: #FFFFFF;cursor:pointer; ">新增園區</a></li>
                            <li class="nav-item"><a href="{{ url('/address') }}" style="color: #FFFFFF">園區檢視</a></li>
                            <li class="nav-item"><a href="{{ url('s3-image-upload') }}" style="color: #FFFFFF">上傳圖片</a></li>
                            @if(Auth::user()->role_id!=1)
                            <li class="nav-item"><a href="{{ url('importExport') }}" style="color: #FFFFFF">匯出資料</a></li>
                            @endif
                            <li class="nav-item"><a href="#" style="color: #FFFFFF">{{ Auth::user()->name }} </a></li>
                             <li class="nav-item">
                             <a href="{{ route('logout') }}" style="color: #FFFFFF" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            登出</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none; color: #FFFFFF">
                                            {{ csrf_field() }}
                                        </form>
                            </li>

                                </ul>
                            </li>

                    </ul>

                </div>
            </div>
        </nav>

 <!-- 新增園區彈跳視窗 -->
         <form action="/address" method="post">
            {{csrf_field()}}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">新增農田地址</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" style="margin-top:5px" required>輸入名稱</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">確認</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        <!-- 新增園區彈跳視窗 -->
        @endif
        @yield('content')
    </div>
</div>
</body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!--
<footer>

    <img src="img/06.png" style="margin:80px 0px 0px auto;max-width: 35%;" >


</footer>
-->

</html>
