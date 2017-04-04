@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
        <center>
            <div class="btn-group" data-toggle="buttons" style="border: 2px;border-color: #C4E1FF">
                <label class="btn btn-primary active btncolor">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked=""> 全部all
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
    <div class="row" style="margin:50px 20px 30px 20px">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <img src="img/001.JPG" alt="..." class="img-thumbnail">
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
    <div class="row" style="margin: 20px">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <img src="img/001.JPG" alt="..." class="img-thumbnail">
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
</div>

@endsection
