@extends('layouts.app')
@section('title','園區位址')
@section('content')
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <div class="table-responsive" style="background-color:rgba(255, 255, 255, 0.98);">
            <table class="table">
                <tr>
                    <td>編號</td>
                    <td>園區位址</td>
                    <td>修改位址</td>
                    <td>刪除位址</td>
                </tr>
                @foreach ($addresses as $address)

                <tr>
                    <td>{{$address->id}}</td>
                    <td>{{$address->name}}</td>
                    <td><button type="button" class="btn btn-sm btn-success clickable" data-toggle="modal" data-target="#AddressModify{{$address->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改</button></td>
                    <td><button type="button" class="btn btn-sm btn-danger clickable"  data-toggle="modal" data-target="#AddressDelete{{$address->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>刪除</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
@foreach ($addresses as $address)
<div class="modal fade" id="AddressModify{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">修改園區</h4>
          </div>
          <form class="form-horizontal" action="address/{{$address->id}}"  method="post">
          <div class="modal-body">
          {{method_field('PUT')}}
          <input type="hidden" name="id" value="{{$address->id}}">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">園區位址</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" required="required"  placeholder="園區位址" value="{{$address->name}}">
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Close</button>
            <button type="submit" action="AccountList" name="type" value="deleteMember" class="btn btn-md btn-primary">確認</button>
          </div>

        </form>
        </div>
      </div>
    </div>
     @endforeach
     @foreach ($addresses as $address)
<form action="address/{{$address->id}}" method="post">
    <div class="modal fade" id="AddressDelete{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">刪除園區</h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">

                  {{csrf_field()}}
          			{{method_field('DELETE')}}
              <tbody>
              <input type="hidden" name="id" value="{{$address->id}}">
              	<tr>
                 <td>編號</td>
                 <td>園區位址</td>
                </tr>
                <tr>
                  <td>{{$address->id}}</td>
                  <td>{{$address->name}}</td>
                </tr>
              </tbody>
            </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" action="AccountList" name="type" value="deleteMember" class="btn btn-danger">確認 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </div>
              </div>
            </div>
          </div>
          </form>
          @endforeach
@endsection