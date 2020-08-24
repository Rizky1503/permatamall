@extends('layouts.backend-mitra')

@section('content')

<div class="row"> 
    @include('mitra::include.menu_bimbel_offline')

    <div class="col-md-9">
        <div id="exTab2">        
            <div class="tab-content ">
                <div class="tab-pane active" id="1">
                	@if($tingkat == "SD")
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kota</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Muhamad</td>
                                    <td>Jakarta Selatan</td>
                                </tr>
                            </table>
                        </div>
                    </div>              
                    @elseif($tingkat == "SMP")
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kota</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Jhon</td>
                                    <td>Jakarta Selatan</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sam Haerudin</td>
                                    <td>Aktif</td>
                                    <td>Surabaya</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>rizal</td>
                                    <td>Bandung</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Usman</td>
                                    <td>Jakarta Selatan</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Roy</td>
                                    <td>Lombok</td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>              
                    @else
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kota</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Muhamad</td>
                                    <td>Jakarta Barat</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Azis</td>
                                    <td>Semarang</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rizky</td>
                                    <td>Malang</td>
                                </tr>
                            </table>
                        </div>
                    </div>                                  
                    @endif      
                </div>
            </div>
        </div>
    </div>    
</div>
@stop
@section('script')
<style type="text/css">
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #fff;
    font-weight: bold;
    cursor: default;
    background-color: #3eb960;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
    border-radius: 2px;
}    
.tab-content {
    padding: 15px 0px 10px 0px;
}

::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
@endsection
