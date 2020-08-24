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
                          <input type="radio" checked="checked" name="filter" value="tahun">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="container-radio">Bulan
                          <input type="radio" name="filter" value="bulan">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="container-radio">Hari
                          <input type="radio" name="filter" value="hari">
                          <span class="checkmark-radio"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top: 15px;">
                <div class="col-md-12">
                    <span style="font-size: 22px; font-weight: bold">SD</span>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Total Murid</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Paket 1 Tahun</td>
                                <td>1</td>
                                <td>
                                    <button class="btn btn-primary" id="sd" data-product="paket 1 tahun" onclick="functionGetData(this.id, $(this).data('product'))">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <span style="font-size: 22px; font-weight: bold">SMP</span>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Total Murid</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Paket 6 Bulan</td>
                                <td>5</td>
                                <td>
                                    <button class="btn btn-primary" id="smp" data-product="paket 1 tahun" onclick="functionGetData(this.id, $(this).data('product'))">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <span style="font-size: 22px; font-weight: bold">SMA</span>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Total Murid</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Paket 1 Tahun</td>
                                <td>3</td>
                                <td>
                                    <button class="btn btn-primary" id="sma" data-product="paket 1 tahun" onclick="functionGetData(this.id, $(this).data('product'))">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- tahun -->
<div class="modal fade-scale" id="tahunModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="get" action="{{ route('Mitra.BOF.detail_siswa') }}">
            <input type="hidden" name="tingkat" class="hiddentahun">
            <input type="hidden" name="product" class="hiddenproduct">
            <div class="modal-body">
                <div class="form-group">
                    <label for="usr">Pilih Tahun:</label>
                    <select name="tahun" class="form-control">
                        <option value="semua">Semua</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                    </select>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi & Lanjutkan</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- bulan -->
<div class="modal fade-scale" id="bulanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="get" action="{{ route('Mitra.BOF.detail_siswa') }}">
            <input type="hidden" name="tingkat" class="hiddentahun">
            <input type="hidden" name="product" class="hiddenproduct">
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="usr">Pilih Tahun:</label>
                            <select name="tahun" class="form-control">
                                <option value="semua">Semua</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>                
                        </div>
                        <div class="col-md-6">
                            <label for="usr">Pilih Bulan:</label>
                            <select name="bulan" class="form-control">
                                <option value="semua">Semua</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                            </select>                
                        </div>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi & Lanjutkan</button>
            </div>
        </form>        
    </div>
  </div>
</div>

<!-- hari -->
<div class="modal fade-scale" id="hariModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="get" action="{{ route('Mitra.BOF.detail_siswa') }}">
            <input type="hidden" name="tingkat" class="hiddentahun">
            <input type="hidden" name="product" class="hiddenproduct">
            <div class="modal-body">
                <div class="form-group">
                    <label for="usr">Pilih tanggal Mulai dan Selesai:</label>
                    <input type="text" name="tanggal" value="01 Jan 2018 - 24 Jan 2018" class="form-control" readonly="readonly" />
                </div>             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Konfirmasi & Lanjutkan</button>
            </div>
        </form>
    </div>
  </div>
</div>

@stop
@section('script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript">
$(function() {
    $('input[name="tanggal"]').daterangepicker({
        opens: 'left',
        minDate: '01 Jan 2018',
        maxDate: '30 Jan 2018',
        locale: {
          format: 'DD MMM YYYY'
        }
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});


function functionGetData(response,responses) {
    console.log(responses);

    var filter = $("input[name='filter']:checked").val();
    if (filter == "tahun") {
        $('#tahunModal').modal().show();
    }else if (filter == "bulan") {
        $('#bulanModal').modal().show();
    }else{
        $('#hariModal').modal().show();
    }    

    $('.hiddentahun').val(response);
    $('.hiddenproduct').val(responses);

}
</script>

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

.fade-scale {
  transform: scale(0);
  opacity: 0;
  -webkit-transition: all .25s linear;
  -o-transition: all .25s linear;
  transition: all .25s linear;
}

.fade-scale.in {
  opacity: 1;
  transform: scale(1);
}
</style>
@endsection
