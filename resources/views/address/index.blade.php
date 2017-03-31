@extends('layouts.app')
@section('title','園區位址')
@section('content')
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>編號</td>
                    <td>園區位址</td>
                    <td>修改位址</td>
                    <td>刪除位址</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>花蓮富里</td>
                    <td><button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#AddressModify"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改</button></td>
                    <td><button type="button" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#AddressDelete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>刪除</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="AddressModify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">修改園區</h4>
          </div>
          <form class="form-horizontal" action=""  method="post">
          <div class="modal-body">
          <input type="hidden" name="M_id" value="">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">園區位址</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="M_name" required="required"  placeholder="園區位址" value="">
                </div>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" action="AccountList" name="type" value="deleteMember" class="btn btn-primary">確認</button>
          </div>
        
        </form>
        </div>
      </div>
    </div>
<form action="AddresDelete" method="post">
    <div class="modal fade" id="AddressDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">刪除會員</h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped">
              <tbody>
              <input type="hidden" name="M_id" value="">
                <tr>
                  <td><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp&nbspe花蓮</td>
                </tr>
              </tbody>
            </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" action="AccountList" name="type" value="deleteMember" class="btn btn-primary">確認</button>
                </div>
              </div>
            </div>
          </div>
          </form>
@endsection