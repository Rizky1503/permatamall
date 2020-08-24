@extends('mitra::layouts.master-v2')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-6">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <!--begin: Datatable -->
        <table class="m-datatable" id="html_table" width="100%" style="min-height: 400px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Tingkat</th>
                    <th>Mata Pelajaran</th>
                    <th>Kota Mengajar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ListProd as $key => $ListJadwal)
                <?php
                $keterangan = json_decode($ListJadwal->keterangan);
                ?>
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $ListJadwal->nama }}</td>
                    <td>{{ $keterangan->tingkat }}</td>
                    <td>{{ $keterangan->mata_pelajaran }}</td>
                    <td>{{ $keterangan->kota }}</td>
                    <td>
                        <span style="overflow: visible; width: 300px;">                     
                            <a href="{{ route('Mitra.Product.jadwal_detail_privat',[encrypt($ListJadwal->id_invoice)]) }}" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon">
                                <span>
                                    <i class="flaticon-time-3"></i>
                                    <span>
                                        Lihat Jadwal
                                    </span>
                                </span>
                            </a>               
                        </span>
                    </td>
                </tr>
                @endforeach            
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
var DatatableHtmlTableDemo = function() {
    var e = function() {
        a = $(".m-datatable").mDatatable({
            search: {
                input: $("#generalSearch")
            },
            columns: [{
                field: "No",
                width: 20
            }, {
                field: "Nama Siswa",
                width: 200
            }, {
                field: "Tingkat",
                width: 70
            }, {
                field: "Mata Pelajaran",
                width: 100
            }, {
                field: "Kota Mengajar",
                width: 120
            }, {
                field: "Status",
                width: 80
            }, {
                field: "Aksi",
                width: 150
            }]
        })
        
    };
    return {
        init: function() {
            e()
        }
    }
}();
jQuery(document).ready(function() {
    DatatableHtmlTableDemo.init()
}); 
</script>

<style type="text/css">
.list_product_mitra_flag{
    border-bottom: 1px solid #b6b6b6;
    padding: 10px 0px;
}    
</style>
@endsection
