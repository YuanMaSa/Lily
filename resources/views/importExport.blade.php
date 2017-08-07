@extends('layouts.app')

@section('content')

	<div class="container">

		<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel</button></a>
		<div class="col-md-12" style="margin-top: 50px;">
			<div class="table-card hide_title">
			    <div><p style="width:180px;">照片</p></div>
			    <div class="content">農戶名稱</div>
			    <div class="content">Email</div>
			    <div class="content">乾燥製程方式</div>
			    <div class="content">L 值</div>
			    <div class="content">a 值</div>
			    <div class="content">b 值</div>
			    <div class="content">取樣時間</div>
			    <div class="content">園區位址</div>
			    <div class="content">上傳時間</div>
			  </div>
			<div class="table-cards">
			@foreach($photodetails as $photodetail)
			  <div class="table-card">
			    <div>
			    	<img style="width: 180px;" src="{{$photodetail->photo_url}}">
			    </div>
			    <div class="content">
			    	<p class="show_title">農戶名稱: &nbsp{{$photodetail->UName}}</p>
			    	<p class="hide_title">{{$photodetail->UName}}</p>
			    </div>
			    <div class="content">
				    <p class="show_title">Email :&nbsp{{$photodetail->email}}</p>
			    	<p class="hide_title">{{$photodetail->email}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">乾燥製程方式 :&nbsp{{$photodetail->method}}</p>
			    	<p class="hide_title">{{$photodetail->method}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">L 值 :&nbsp{{$photodetail->L_value}}</p>
			    	<p class="hide_title">{{$photodetail->L_value}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">a 值 :&nbsp{{$photodetail->a_value}}</p>
			    	<p class="hide_title">{{$photodetail->a_value}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">b 值 :&nbsp{{$photodetail->b_value}}</p>
			    	<p class="hide_title">{{$photodetail->b_value}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">取樣時間 :&nbsp{{$photodetail->take_time}}</p>
			    	<p class="hide_title">{{$photodetail->take_time}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">園區位址 :&nbsp{{$photodetail->AName}}</p>
			    	<p class="hide_title">{{$photodetail->AName}}</p>
			    </div>
			    <div class="content">
			    	<p class="show_title">上傳時間 :&nbsp{{$photodetail->created_at}}</p>
			    	<p class="hide_title">{{$photodetail->created_at}}</p>
			    </div>
			    
			  </div>
			@endforeach
			</div>
		</div>
	</div>

@endsection