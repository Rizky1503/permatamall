@extends('layouts.FrontEnd')
@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span class="heading"><i class="fa fa-bell-o"></i> Pemberitahuan</span>
      <span style="float: right;">
        <select class="form-control-select-notification">
          <option>Filter Produk</option>
          <option>Semua</option>
          <option>Privat</option>
        </select>
      </span>
    </div>
    <div class="panel-body">Halaman pemberitahuan masih dalam pengembangan</div>
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
  .panel{
    border-radius: 2px;
  }

  .panel-heading>.heading{
    font-size: 18px;
    font-weight: bold;
  }

  .form-control-select-notification{
    display: block;
    width: 100%;
    height: 25px;
    padding: 2px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  }
</style>
@endsection
