@extends('layouts.backend-mitra')

@section('content')

<div class="row"> 
    @include('mitra::include.menu_bimbel_offline')

    <div class="col-md-9">
        <div class="tab-content ">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Nama Siswa</th>
                        <th>Tingkat</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Paket 1 Tahun</td>
                        <td>Muhamad</td>
                        <td>SD</td>
                        <td>06 September 2019</td>
                        <td>Aktif</td>
                    </tr>
                </table>
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
