@extends('layouts.app')
@section('content')
<script>
$(function (){

    function format_float(num, pos)
    {
        var size = Math.pow(10, pos);
        return Math.round(num * size) / size;
    }

    function preview(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.preview').attr('src', e.target.result);
                var KB = format_float(e.total / 1024, 2);
                $('.size').text("檔案大小：" + KB + " KB");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on("change", ".upl", function (){
        preview(this);
    })

})
</script>

<div class="container">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
     </ul>
      </div>
      @endif


	  @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{{ $message }}</strong>
		</div>
		<img src="{{ Session::get('path') }}">
	  @endif
<form class="form-horizontal"  action="{{ url('s3-image-upload') }}" enctype="multipart/form-data" method="POST">
{{ csrf_field() }}

 <div class="row" style="margin-top: 100px;">
  <div class="col-md-1 col-sm-1"></div>
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

  <div class="col-md-5 col-sm-11" style="border:2px #005AB5 solid;border-radius:10px;padding-top: 50px;padding-bottom: 30px">
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >含水量</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" class="form-control" id="exampleInputEmail1" placeholder="含水量" name="water" required>
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
       <option value="{{$process->id}}">{{$process->method}}</option>
       @endforeach
     </select>
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >取樣時間</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="取樣時間" name="take_time" required>
       </div>
       <div class="col-sm-2 control-label" style="text-align: left;">小時</div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >L</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="L值" name="L_value" required>
       </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1">a</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="a值" name="a_value" required>
       </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1">b</label>
    </div>
       <div class="col-sm-7 control-label">
        <input type="number" min="0" max="100" step="0.1" class="form-control" id="exampleInputEmail1" placeholder="b值" name="b_value" required>
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" >所屬園區</label>
    </div>
       <div class="col-sm-7 control-label">
        <select class="form-control" name="address_id" required>
        @foreach ($addresses as $address)
       <option value="{{$address->id}}">{{$address->name}}</option>
       @endforeach
     </select>
       </div>
    </div>
     <div class="form-group">
    <div class="col-sm-3 control-label ">
     <label  for="exampleInputEmail1" style="color: red;">*所屬園區若為空白，請先新增園區</label>
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
        <img class="preview" style="max-width: 150px; max-height: 200px; margin: 20px">
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