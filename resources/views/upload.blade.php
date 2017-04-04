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
<form class="form-horizontal" action="{{ url('s3-image-upload') }}" enctype="multipart/form-data" method="POST">
{{ csrf_field() }}
	<div class="row" style="margin-top: 200px;">
		<div class="col-md-3 col-sm-0"></div>
		<div class="col-md-6 col-sm-12">
			<div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">含水量</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<input type="number" class="form-control" id="exampleInputEmail1" placeholder="含水量">
			    </div>
			    <div class="col-sm-2 control-label">%</div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">乾燥製程</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<select class="form-control">
					  <option>日曬製程</option>
					  <option>低溫製程</option>
					  <option>熱風製程</option>
					  <option>其他製程</option>
					</select>
			    </div>
			 </div>
			  <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">取樣時間</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<input type="number" class="form-control" id="exampleInputEmail1" placeholder="取樣時間">
			    </div>
			    <div class="col-sm-2 control-label">小時</div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">L</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<input type="number" class="form-control" id="exampleInputEmail1" placeholder="L值">
			    </div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">a</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<input type="number" class="form-control" id="exampleInputEmail1" placeholder="a值">
			    </div>
			 </div>
			 <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">b</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<input type="number" class="form-control" id="exampleInputEmail1" placeholder="b值">
			    </div>
			 </div>
			  <div class="form-group">
				<div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">所屬園區</label>
				</div>
			    <div class="col-sm-7 control-label">
			    	<select class="form-control">
					  <option>瑞穗段</option>
					  <option>花蓮段</option>
					</select>
			    </div>
			 </div>
			 <div class="form-group">
			    <div class="col-sm-2 control-label ">
					<label  for="exampleInputEmail1">上傳檔案</label>
				</div>
				<div class="col-sm-7 control-label">
				<input type='file' name="image" class="upl">
				</div>
			  </div>
			   <div class="form-group">
			    <div class="col-sm-9 control-label ">
			        <img class="preview" style="max-width: 300px; max-height: 300px;">
				</div>
			  </div>
		</div>
		<div class="col-md-3 col-sm-0"></div>
		<button type="submit" class="btn btn-success">Upload</button>
	</div>
</form>

</div>

@endsection