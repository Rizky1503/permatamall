@extends('layouts.backend-mitra')

@section('content')

<div class="row"> 
    @include('mitra::include.menu_bimbel_offline')

    <div class="col-md-9">
        <div class="tab-content ">
            <div class="form-group">
                <label for="usr">Pilih Cabang:</label>
                <select name="jenis_kelamin" class="form-control" onchange="functionGetCabang(this.value)">
                    <option value="">Pilih</option>
                    <option value="Bimbel Ganesha Cabang Surabaya">Bimbel Ganesha Cabang Surabaya</option>
                </select>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" style="display: none;" id="showdata">
                    <tr>
                        <td colspan="2">Nama Cabang</td>
                        <td colspan="5"><span id="nama_cabang"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nama Penganggungjawab</td>
                        <td colspan="5"><span id="nama_penanggung_cabang"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Telp Penganggungjawab</td>
                        <td colspan="5"><span id="telp_penanggung_cabang"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Alamat Cabang</td>
                        <td colspan="5"><span id="alamat_cabang"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Jumlah Pendaftar Online</td>
                        <td colspan="5"><span id="total_murid_cabang"></span></td>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Jenis Paket</th>
                        <th>Total Murid</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>SD 4,5,6</td>
                        <td>1 Tahun</td>
                        <td>100</td>
                        <td>300.000</td>
                        <td>30.000.000</td>
                        <td>
                            <a href="{{ route('Mitra.BOF.detail_cabang',['ganesha-operation-cabang-surabaya']) }}" class="btn btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>SMP 7,8,9</td>
                        <td>1 Tahun</td>
                        <td>30</td>
                        <td>500.000</td>
                        <td>15.000.000</td>
                        <td>
                            <a href="{{ route('Mitra.BOF.detail_cabang',['ganesha-operation-cabang-surabaya']) }}" class="btn btn-primary">
                                Detail
                            </a>
                        </td>
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
    min-height: 300px;
}
</style>
<script type="text/javascript">
    function functionGetCabang(response) {
        if (response == "") {
            $('#showdata').hide();            
        }else{
            $('#nama_cabang').html(response);
            $('#nama_penanggung_cabang').html('Sidiq S.kom');
            $('#telp_penanggung_cabang').html('0821 2345 3932');
            $('#alamat_cabang').html('Jl raya veteran III');
            $('#total_murid_cabang').html('130');
            $('#showdata').show();            
        }
    }
</script>
@endsection
