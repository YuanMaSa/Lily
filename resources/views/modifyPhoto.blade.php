@extends('layouts.app')
@section('content')
<div class="container">
<form class="form-horizontal"  action="s3-image-upload/{{$photodetail->id }}"  method="POST">
{{ csrf_field() }}
{{method_field('PUT')}}
 <div class="row" style="margin-top: 100px;">
  <div class="col-md-1 col-sm-1"></div>
<input type="hidden" name="id" value="{{$photodetail->id }}">
  <div class="col-md-5 col-sm-11" style="border:2px #005AB5 solid;border-radius:10px;padding-top: 50px;padding-bottom: 30px">
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >含水量</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" class="form-control" id="exampleInputEmail1" placeholder="含水量" name="water" value="{{$photodetail->water}}" required>
       </div>
       <div class="col-sm-1 control-label">%</div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1">乾燥製程</label>
    </div>
       <div class="col-sm-7 control-label">
        <select class="form-control" name="process_id">
    @foreach ($processes as $process)
      @if($process->id===$photodetail->process_id)
          <option value="{{$process->id}}" selected>{{$process->method}}</option>
      @else
          <option value="{{$process->id}}" >{{$process->method}}</option>
      @endif
       @endforeach
     </select>
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >取樣時間</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="取樣時間" name="take_time" required value="{{$photodetail->take_time}}">
       </div>
       <div class="col-sm-2 control-label" style="text-align: left;">小時</div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >L</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="L值" name="L_value" required value="{{$photodetail->L_value}}">
       </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1">a</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="a值" name="a_value" required value="{{$photodetail->a_value}}">
       </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1">b</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="b值" name="b_value" required value="{{$photodetail->b_value}}">
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >所屬園區</label>
    </div>
       <div class="col-sm-7 control-label">
        <select class="form-control" name="address_id" required>
        @foreach ($addresses as $address)
          @if($address->id===$photodetail->address_id)
              <option value="{{$address->id}}" selected>{{$address->name}}</option>
          @else
               <option value="{{$address->id}}">{{$address->name}}</option>
          @endif
         @endforeach
     </select>
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-10 control-label ">
     <label  for="exampleInputEmail1" style="color: rgba(255, 0, 0, 0.54);">*所屬園區若為空白，請先新增園區</label>
    </div>
    </div>


  </div>
  <div class="col-md-5 col-sm-0" >

   <div class="form-group">


       <div class="col-sm-3 col-sm-offset-3 control-label ">

     <label  for="exampleInputEmail1">上傳檔案</label>
    </div>
    </div>

    <div class="form-group">

       <div class="col-sm-3 col-sm-offset-1 control-label " >
       <div style="background-image: url(img/cloud.png);width:250px;height: 150px; margin-left:50px;background-repeat: no-repeat; " >
        <input type='file' class="upl" name="image" style="padding: 70px 45px">
       </div>
        <img src="{{$photodetail->photo_url}}" class="preview" style="max-width: 150px; max-height: 200px; margin: 20px">
    </div>
    </div>
    </div>
     <div class="col-md-1 col-sm-1"></div>
     </div>
  <div class="row">
   <div class="col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
    <button type="submit" class="btn btn-primary" style="margin: 50px 0px 50px">確認</button>
   </div>
   </div>

  </form>


  </div>


@endsection