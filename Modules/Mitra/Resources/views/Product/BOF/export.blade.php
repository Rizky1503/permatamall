@extends('layouts.backend-mitra')

@section('content')

<div class="row"> 
    @include('mitra::include.menu_bimbel_offline')

    <div class="col-md-9">
        <div id="exTab2">        
            <div class="tab-content ">
                <div class="tab-pane active" id="1">
                	<div class="form-group">
                        <label for="usr">Pilih Tingkat Export:</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">Pilih</option>
                            <option value="all">Semua</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usr">Pilih Status Siswa:</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">Pilih</option>
                            <option value="all">Semua</option>
                            <option value="SD">Aktif</option>
                            <option value="SMP">Tidak Aktif</option>
                        </select>
                    </div>
                    @if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909131000000008")
                        <div class="form-group">
                            <label for="usr">Pilih Cabang:</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih</option>
                                <option value="all">Semua</option>
                                <option value="Jakarta Selatan">Bimbel Ganesha Cabang Jakarta Selatan</option>
                                <option value="Surabaya">Bimbel Ganesha Cabang Surabaya</option>
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <a href="{!! asset('public/file/file-export-ganeshaoperation.xlsx') !!}" download class="btn btn-primary">Export</a>
                    </div>   
                </div>
            </div>
        </div>
    </div>    
</div>
@stop
@section('script')
<style type="text/css">
.tab-content {
    padding: 15px;
}    
</style>

@endsection
