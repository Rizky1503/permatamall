<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">                            
        	<img src="{!! asset('public/images/contoh-bimbel.jpg') !!}" style="width: 100%;margin-bottom : 10px;margin-top: -10px; min-height: 100px;">
        	<hr>
            @if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909131000000008")
                <p><a href="{{ route('Mitra.Profile.index') }}"><b>Profil</b></a></p>            
                <p><a href="{{ route('Mitra.BOF.index') }}"><b>List Siswa</b></a></p>
                <p><a href="{{ route('Mitra.BOF.export') }}"><b>Export</b></a></p>
                <p><a href="{{ route('Mitra.BOF.keuangan') }}"><b>Keuangan</b></a></p>
                <p><a href="{{ route('Mitra.BOF.cabang') }}"><b>Cabang</b></a></p>
            @else
                <p><a href="{{ route('Mitra.Profile.index') }}"><b>Profil</b></a></p>            
                <p><a href="{{ route('Mitra.BOF.index') }}"><b>List Siswa</b></a></p>
                <p><a href="{{ route('Mitra.BOF.export') }}"><b>Export</b></a></p>
                <p><a href="{{ route('Mitra.BOF.keuangan') }}"><b>Keuangan</b></a></p>
            @endif            
        </div>
        <a href="{{ route('Mitra.index') }}">
        	<div style="padding: 15px;background: #56c174;font-weight: bold;color: #fff;">
	        	Halaman Utama
	        </div>
        </a>        
    </div>
</div>