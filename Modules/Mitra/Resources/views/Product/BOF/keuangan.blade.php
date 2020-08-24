@extends('layouts.backend-mitra')

@section('content')

<div class="row"> 
    @include('mitra::include.menu_bimbel_offline')

    <div class="col-md-9">
        <div class="tab-content ">
            <div class="row" style="padding-top: 15px; background-color: #3eb960">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="container-radio">Tahun
                          <input type="radio" checked="checked" name="radio">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="container-radio">Bulan
                          <input type="radio" name="radio">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="container-radio">Hari
                          <input type="radio" name="radio">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 15px;">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Tingkat</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Paket 1 Tahun</td>
                                <td>SD</td>
                                <td>10 Siswa</td>
                                <td>100.000</td>
                                <td>1.000.000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Paket 6 Bulan</td>
                                <td>SMA</td>
                                <td>2 Siswa</td>
                                <td>250.000</td>
                                <td>500.000</td>
                            </tr>
                            <tr>
                              <td colspan="5" align="right">Total</td>
                              <td>1.500.000</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@stop
@section('script')
<style>
/* The container-radio */
.container-radio {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #fff;
}

/* Hide the browser's default radio button */
.container-radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark-radio {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container-radio:hover input ~ .checkmark-radio {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container-radio input:checked ~ .checkmark-radio {
  background-color: #1a7834;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark-radio:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container-radio input:checked ~ .checkmark-radio:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container-radio .checkmark-radio:after {
    top: 6px;
    left: 6px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

.tab-content {
    background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top: 5px solid #3eb960;
    border-bottom: 5px solid #3eb960;
    padding: 0px 15px;
    min-height: 500px;
}
</style>
@endsection
