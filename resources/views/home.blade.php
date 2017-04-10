@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    
   
        <div class="col-sm-8 col-md-8" style="background-image: url(img/sun.png);background-position:left;background-size: 150px;background-repeat:no-repeat;">
        <center>
            <div class="btn-group" data-toggle="buttons" style="border: 2px;border-color: #C4E1FF;margin: 50px auto 20px auto;">
           <!-- background-image: url(img/sun.png);background-position:left;background-size: 150px;background-repeat:no-repeat; -->

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
            </div>
            </center>
        
        </div>
        <div class="col-sm-2 col-md-2"></div>
    </div>
    <!-- heeader 按鈕 -->

    <div class="row">

    <form   action="{{ url('/home') }}"  method="POST">

{{ csrf_field() }}
 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

@foreach ($photodetails as $photodetail)
@foreach ($processes as $process)
    <div class="row" style="margin:50px 20px 30px 20px">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <img src="img/001.JPG" alt="..." class="img-thumbnail">
            <div class="thumbnail">
                <div class="caption">
                    <p>含水量：{{$photodetail->water}} %</p>
                    <p>乾燥製程：{{$process->photo}}</p>
                    <p>日期：{{$photodetail->created_at}}</p>
                    <!---
        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
        -->
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="img/002.jpg" alt="..." class="img-thumbnail">
            <div class="thumbnail">
                <div class="caption">
                    <p>含水量：100 %</p>
                    <p>乾燥製程：風乾</p>
                    <p>日期：2017-02-02</p>
                    <!---
        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
        -->
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="img/003.jpg" alt="..." class="img-thumbnail">
            <div class="thumbnail">
                <div class="caption">
                    <p>含水量：100 %</p>
                    <p>乾燥製程：風乾</p>
                    <p>日期：2017-02-02</p>
                    <!---
        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
        -->
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="img/004.jpg" alt="..." class="img-thumbnail">
            <div class="thumbnail">
                <div class="caption">
                    <p>含水量：100 %</p>
                    <p>乾燥製程：風乾</p>
                    <p>日期：2017-02-02</p>
                    <!---
        <p><a href="#" class="btn btn-primary btn-sm" role="button">Button</a> <a href="#" class="btn btn-default btn-sm" role="button">Button</a></p>
        -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
    </form>
</div>

@endsection
