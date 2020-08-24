@extends('mitra::layouts.master')

@section('content')
@include('mitra::include.menu_home')
<div class="row"> 
    <div class="col-md-3">
    	<div class="panel panel-default">
	        <div class="panel-body">                            
                <p><a href="{{ route('Mitra.Profile.index') }}"><b>Profil</b></a></p>            
                <p><a href="{{ route('Mitra.Profile.password') }}"><b>Ubah Password</b></a></p>
	        </div>
	        <a href="{{ route('Mitra.index') }}">
	        	<div style="padding: 15px;background: #56c174;font-weight: bold;color: #fff;">
		        	Halaman Utama
		        </div>
	        </a>        
	    </div>
	</div>

    <div class="col-md-9">
        <div class="tab-content ">
        	@if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909181000000010")
        	<div class="row">
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Nama Bimbel Pusat</label>
		                <br>
		                <span>Bimbel Ganesha</span>	                
		            </div>		            
        		</div>        		
        		<div class="col-md-6">
					<div class="form-group">
		                <label for="usr">Alamat Bimbel Pusat</label>
		                <br>
		                <span>Jl Verteran III</span>	                
		            </div>        		
		        </div>        		
        	</div>
        	<hr>
        	@endif        	
        	<div class="row">
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Nama Bimbel:</label>
		                <input type="text" name="" class="form-control" value="Bimbel Ganesha">
		            </div>
        		</div>
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Jenis Bimbel:</label>
		                @if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909181000000010")
		                <input type="text" name="" class="form-control" value="Cabang" disabled="disabled">
		                @else
		                <input type="text" name="" class="form-control" value="Pusat" disabled="disabled">
		                @endif
		            </div>
        		</div>
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Email:</label>
		                @if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909181000000010")
			                <input type="text" name="" class="form-control" value="cabang_bg@gmail.com">
		                @else
			                <input type="text" name="" class="form-control" value="bimbelganesha@gmail.com">		                
		                @endif		                
		            </div>
        		</div>
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Nama Penganggunjawab:</label>
		                <input type="text" name="" class="form-control" value="Sidiq S.kom">
		            </div>
        		</div>
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Telp Penganggunjawab:</label>
		                <input type="text" name="" class="form-control" value="0821 2828 2822">
		            </div>
        		</div>
        		<div class="col-md-6">
		            <div class="form-group">
		                <label for="usr">Kota:</label>
		                <select class="form-control select2">
		                	@foreach($kotaList as $listkota)
		                	<option value="{{ $listkota }}">{{ $listkota }}</option>
		                	@endforeach
		                </select>
		            </div>
        		</div>
        		<div class="col-md-12">
		            <div class="form-group">
		                <label for="usr">Alamat:</label>
		                <textarea class="form-control" rows="3">Jl Veteran III</textarea>
		            </div>
        		</div>        		
        	</div>
            <div class="form-group">
            	<button class="btn btn-primary">
            		Ubah Profile
            	</button>
            </div>
        </div>       
    </div>    
</div>
@stop
@section('script')
@endsection

