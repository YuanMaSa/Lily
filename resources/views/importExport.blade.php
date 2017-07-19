@extends('layouts.app')

@section('content')

	<div class="container">

		<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download CSV</button></a>
	</div>

@endsection