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
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('Mitra.exDaftar',['prod' => 'Privat']) }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-cart-plus"></i>
                            <span>
                                Tambah Les Privat
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <!--begin: Datatable -->
        <table class="m-datatable" id="html_table" width="100%" style="min-height: 400px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Tingkat</th>
                    <th>Mata Peajaran</th>
                    <th>Kota Mengajar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ListProd as $key => $ListProduct)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $ListProduct->nama_produk }}</td>
                    <td>{{ $ListProduct->module }}</td>
                    <td>{{ $ListProduct->sub_module }}</td>
                    <td>{{ $ListProduct->kota }}</td>
                    <td>
                        @if($ListProduct->status_product == "Aktif")
                            <span style="width: 110px;">
                                <span class="m-badge m-badge--success m-badge--wide">{{ $ListProduct->status_product }}</span>
                            </span>
                        @else
                            <span style="width: 110px;">
                                <span class="m-badge  m-badge--warning m-badge--wide">Sedang diproses</span>
                            </span>
                        @endif  
                    </td>
                    <td>
                        @if($ListProduct->status_product == "Aktif")
                            <span style="overflow: visible; width: 300px;">                     
                                <div class="dropdown ">                         
                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                
                                        <i class="la la-ellipsis-h"></i>                            
                                    </a>                            
                                    <div class="dropdown-menu dropdown-menu-right">                                          
                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Nonaktifkan Les Privat</a>
                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Print</a>               
                                    </div>                      
                                </div>                  
                                <a href="{{ route('Mitra.Product.List',[encrypt($ListProduct->id_produk)]) }}" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-users"></i>
                                        <span>
                                            Murid
                                        </span>
                                    </span>
                                </a>               
                            </span>
                        @endif
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
                field: "Nama Produk",
                width: 200
            }, {
                field: "Tingkat",
                width: 70
            }, {
                field: "Mata Pelajaran",
                width: 80
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
