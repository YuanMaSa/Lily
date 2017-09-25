@extends('layouts.app1')

@section('content')
<div class="container">

<div>

          <!-- Tab panes -->
          <div class="tab-content"> <!--顯示全部-->
            <div role="tabpanel" class="tab-pane active masonry" id="home" >
                   <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row" style="margin:50px 20px 30px 20px">
                    @foreach ($photodetails1 as $photodetail)
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                            <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center><!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive">     -->
                            <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                            <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive">-->    
                            <div class="caption"> 
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                            <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive">-->    
                            <div class="caption"> 
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                        <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive">  -->   
                            <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                            <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive"> -->    
                            <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                        <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive"> -->    
                            <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
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
                    @if($photodetail->address_id==$address->id)
                    <div class="col-md-3 col-xs-12">
                        <div class="thumbnail">
                        <center><div style="background-image: url('{{$photodetail->photo_url}}');background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;"></div></center>
                            <!-- <img src="{{$photodetail->photo_url}}" alt="..." class="img-responsive"> -->    
                            <div class="caption">
                                    <p>含水量：{{$photodetail->water}} %</p>
                                    <p>乾燥製程：{{$photodetail->method}}</p>
                                    <p>日期：{{$photodetail->created_at}}</p>
                                    <p>
                                    <center>
                                    <form action="modifyPhoto" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                         {{method_field('POST')}}
                                         <input type="hidden" name="id" value="{{$photodetail->id}}">
                                        <button class="btn btn-success btn-sm" type="submit">修改</button>
                                    </form>
                                    <form action="s3-image-upload/{{$photodetail->id}}" method="post" style="display: inline">
                                        {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                    </form>
                                    </center>
                                    </p>
                                </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    </div>
          </div>

          @endforeach
          </div>
                </div>
                    <?php 

                    // $command = escapeshellcmd('/Users/mindy/Desktop/test.py');
                    $command = escapeshellcmd('./../test.py 1 2 3 6 7 8');
                    $output = shell_exec($command);
                    echo "<h1 style='color:#ffffff;'>".$output."</h1>";
                    echo "helllllllllllllllllllllllo";
                    $str1="3,5,5,32";
                    $array1 = explode(",",$str1);
                    echo "<h1 style='color:#ffffff;'> !".$array1[0]." !  ".$array1[1]." !  ".$array1[2]." !  ".$array1[3]." !  ";
                    ?>

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
