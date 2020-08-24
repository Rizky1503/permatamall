<div class="m-portlet__body"> 
	<div class="form-group m-form__group">
      	<div class="row">
        	<div class="col-md-12">
          		<label for="usr">Nama Lengkap:</label>
          		<select class="form-control" onchange="functionGetProduct(this.value)">
		        	<option value="">Pilih produk</option>
		        	@foreach($ListProdCategory as $list)
		        	<option value="{{ base64_encode($list->id_master_kategori) }}" @if($value_prod == $list->kategori) selected="selected" @endif>{{ $list->kategori }}</option>
		        	@endforeach
		        </select>
        	</div>            
      	</div>
  	</div> 
</div>	 