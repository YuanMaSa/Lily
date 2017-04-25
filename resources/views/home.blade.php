@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-2 col-md-2"></div>


        <div class="col-sm-8 col-md-8" style="background-image: url(img/sun.png);background-position:left;background-size: 150px;background-repeat:no-repeat;">
        <center>
            <div class="btn-group" data-toggle="buttons" style="border: 2px;border-color: #C4E1FF;margin: 50px auto 20px auto;">
           <!-- background-image: url(img/sun.png);background-position:left;background-size: 150px;background-repeat:no-repeat; -->

        <div role="tabpanel">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active btncolor btn btn-primary"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部all</a></li>
            <li role="presentation" class="dropdown">
            <a class="dropdown-toggle btncolor btn btn-primary" data-toggle="dropdown" href="#" role="button" aria-expanded="false" >
                    乾燥製程分類 <span class="caret"></span>
            </a>
            <ul class="dropdown-menu " role="menu">

            <li role="presentation" ><a href="#profile1" aria-controls="profile" role="tab" data-toggle="tab">日曬製程</a></li>
            <li role="presentation" ><a href="#profile2" aria-controls="profile" role="tab" data-toggle="tab">乾燥製程</a></li>
            <li role="presentation" ><a href="#profile3" aria-controls="profile" role="tab" data-toggle="tab">風乾製程</a></li>
            <li role="presentation" ><a href="#profile4" aria-controls="profile" role="tab" data-toggle="tab">其他製程</a></li>

                        </ul>
            </li>
            <li role="presentation" class="btncolor btn btn-primary"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">日期分類</a></li>
            <li role="presentation" class="dropdown">
            <a class="dropdown-toggle btncolor btn btn-primary" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    園區分類 <span class="caret"></span>
            </a>
            <ul class="dropdown-menu " role="menu">
            @foreach ($addresses as $address)
            <li role="presentation" ><a href="#settings{{$address->id}}" aria-controls="settings" role="tab" data-toggle="tab">{{$address->name}}</a></li>
            @endforeach
                        </ul>
            </li>

          </ul>
            </div>

        </div>
        </center>
        </div>

        <div class="col-sm-2 col-md-2"></div>
     </div>
<div class="row">
        <form   action="{{ url('/home') }}"  method="POST">
                    {{ csrf_field() }}

          <!-- Tab panes -->
          <div class="tab-content"> <!--顯示全部-->
            <div role="tabpanel" class="tab-pane active container-fluid" id="home" >
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="grid" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails1 as $photodetail)
                        <div class="grid-item">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="profile1">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails2 as $photodetail)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile2">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails3 as $photodetail)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile3">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails4 as $photodetail)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile4">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails5 as $photodetail)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>

            </div>


            <div role="tabpanel" class="tab-pane" id="messages">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails6 as $photodetail)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
            </div>
            @foreach ($addresses as $address)

            <div role="tabpanel" class="tab-pane" id="settings{{$address->id}}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails7 as $photodetail)
            @if ($photodetail->address_id==$address->id)
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <img src="{{$photodetail->photo_url}}" alt="..." class="img-thumbnail">
                            <div class="thumbnail">
                                <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <!---
                        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
                        -->
                                </div>
                            </div>
                        </div>
                         @endif
          @endforeach
                    </div>
          </div>

          @endforeach
          </div>
                </form>
                </div>

        <!--
        <form>
                <label class="btn btn-primary active btncolor">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                    全部all
                </label>

                <label class="btncolor btn btn-primary">
                    <input type="radio" name="options" id="option2" autocomplete="off"> 乾燥製程分類
                </label>
                <label class="btncolor btn btn-primary">
                    <input type="radio" name="options" id="option3" autocomplete="off"> 日期分類
                </label>
                <label class="btncolor btn btn-primary">
                    <input type="radio" name="options" id="option4" autocomplete="off"> 園區分類
                </label>
              </form>
              -->

    <!-- heeader 按鈕 -->
</div>
@endsection
