@extends('mitra::layouts.master-v2')


@section('content')
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-5">
							<div class="m-form__group m-form__group--inline">
								<div class="m-form__label">
									<label>
										Status:
									</label>
								</div>
								<div class="m-form__control">
									<select class="form-control m-bootstrap-select m-bootstrap-select--solid" id="m_form_status">
										<option value="">
											All
										</option>
										<option value="draf">
											draf
										</option>
										<option value="Aktif">
											Aktif
										</option>
										<option value="Tidak Aktif">
											Tidak Aktif
										</option>
									</select>
								</div>
							</div>
							<div class="d-md-none m--margin-bottom-10"></div>
						</div>						
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
					<a href="{{ route('Mitra.Belanja.Product.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
					    <span>
					        <i class="la la-cart-plus"></i>
					        <span>
					            Tambah Barang Baru
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
					<th title="No">
						No
					</th>
					<th title="Nama Barang">
						Nama Barang
					</th>
					<th title="Stok">
						Stok
					</th>
					<th title="Status">
						Status
					</th>
					<th title="Aksi">
						Aksi
					</th>					
				</tr>
			</thead>
			<tbody>
				@foreach($data as $key => $listData)
					<tr>
						<td>
							{{ $key+1 }}
						</td>
						<td>
							{{ $listData->nama_produk }}
							<!-- <span style="border-top: 1px solid rgb(224, 224, 225)">
								<span>
									<i class="la la-shopping-cart"></i> 0								
								</span>
								<span style="float: right;">
									<i class="la la-eye"></i> 10
								</span>
							</span> -->
						</td>
						<td>
							@if($listData->stok  == 0)
								<span style="width: 110px;">
									<span class="m-badge m-badge--danger m-badge--wide">Stok Habis</span>
									<!-- <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                           
										<i class="la la-plus-circle"></i>                        
									</a> -->
								</span>
							@elseif($listData->stok  < 10)
								<span style="width: 110px;">
									<span class="m-badge m-badge--warning m-badge--wide">Stok sisa {{ $listData->stok }}</span>
									<!-- <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                           
										<i class="la la-plus-circle"></i>                        
									</a> -->
								</span>
							@else
								{{ $listData->stok }}
							@endif							
						</td>
						<td>
							@if($listData->status_product == "new")
								<span style="width: 110px;">
									<span class="m-badge m-badge--warning m-badge--wide">Mohon Lengkapi produk</span>
								</span>
							@elseif($listData->status_product == "draf")
								<span style="width: 110px;">
									<span class="m-badge  m-badge--metal m-badge--wide">draf</span>
								</span>
							@elseif($listData->status_product == "Aktif")
								<span style="width: 110px;">
									<span class="m-badge  m-badge--success m-badge--wide">Aktif</span>
								</span>
							@else
								<span style="width: 110px;">
									<span class="m-badge  m-badge--danger m-badge--wide">Tidak Aktif</span>
								</span>
							@endif
						</td>
						<td>
							<span style="overflow: visible; width: 110px;">						
								<div class="dropdown ">							
									<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                
										<i class="la la-ellipsis-h"></i>                            
									</a>						  	
									<div class="dropdown-menu dropdown-menu-right">						    	
										<a class="dropdown-item" href="{{ route('Mitra.Belanja.Product.Gambar',[encrypt($listData->id_produk)]) }}"><i class="la la-edit"></i> Edit Gambar</a>				
										<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Nonaktifkan Produk</a>				
									</div>						
								</div>						
								<a href="{{ route('Mitra.Belanja.Product.edit',[encrypt($listData->id_produk)]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                           
									<i class="la la-edit"></i>                        
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
                width: 2000
            }, {
                field: "Nama Barang",
                width: 100
            }, {
                field: "Stok",
                width: 100
            }, {
                field: "Status",
                width: 100
            }]
        }),
        i = a.getDataSourceQuery();
        $("#m_form_status").on("change", function() {
            a.search($(this).val(), "Status")
            console.log($(this).val());
        }).val(void 0 !== i.Status ? i.Status : ""), $("#m_form_status").on("change", function() {
            a.search($(this).val(), "Status")
        }).val(void 0 !== i.Status ? i.Status : ""), $("#m_form_status").selectpicker()
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
@endsection
