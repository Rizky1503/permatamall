@extends('layouts.FrontEnd')

@section('content')
<div class="container nop space-top-20">
                
<style>
    fieldset {
    border: 1px solid #c0c0c000;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
}
    .header{
		
    }
	.headline {
		margin: 0;
		padding: 0; 
		background: #f4f4f4;
		font-size: 12px;		
	}
	.headline h1 {
		font-size: 24px; 
		font-weight: bold;	
	}
	.headline p {
		margin: 0;
		padding: 0;
	}
	.headline ul {
		list-style: '- '; 
		margin: 0; 
		padding: 0;
	}
	
	.headline li.active > a, .headline > li.active > a:focus, .headline > li.active > a:hover {
		border-bottom: 2px solid #F7E912;
		background-color: transparent;
		color: #333;
	}
	
	.body {
		margin: 0;
		padding: 50px 10%;		
	}

	#thankyou .header {
		margin: 0 auto;
		padding: 50px 0 20px;
		border: 0;
		text-align: center;
	}

	#thankyou .body {
		padding: 15px 10%;
	}

	#thankyou .footer {
		text-align: center;
		border: 0;
		padding-bottom: 50px;
	}

	#thankyou h1 {
		font-size: 30px;
		font-weight: bold;	
	}

	#thankyou h2 {
		font-size: 25px;
		font-weight: bold; 
	}

	#thankyou .checklist {
		width: 90%;
		min-width: 50px;
		max-width: 128px;
		display: block;
		margin: 0 auto;
	}

	.button {
        color: #fdfdfd;
        background-color: #4ec37c;
        border: 1px solid #b8e0f6;
        border-radius: 25px;
        width: 26%;
        min-width: 173px;
        padding: 10px;
        float:center;
        margin-top:-5px;
    }
    .desc{
        font-size: 14px;
        line-height: 1.5em;
        color: #020202 !important;
    }
    .desc-det{
        font-weight: bolder;
        color: red;
    } 
    .navigation--sticky {
        position: unset;
    }     
</style>


<fieldset id="thankyou">
<div class="header">
	<h1>HORE...</h1>
</div>	
<div class="body">
	<div class="text-center">
		<p><img src="http://1.bp.blogspot.com/_FBwWAM6DbGc/TMJ5W6Sf5gI/AAAAAAAAAHg/tdsiC__xgJI/s1600/320px-SMirC-wink.svg.png" class="img-responsive checklist"></p>
		<p class="desc">Kami menemukan <b class="desc-det">4 guru</b> yang sesuai dengan kamu inginkan... </p>
		<p class="desc">Harga sekitar <b class="desc-det">Rp. 20.000 - Rp. 50.000 </b>Mohon tunggu 1x24 jam untuk kami hubungi lebih lanjut..</p>
	</div>
</div>	
<div class="footer text-center">
	<a href="http://localhost/permatamallfrontenddev/" class="btn button">Kembali ke Homepage</a>				
</div>	 
</fieldset>		
            </div>
@endsection
@section('script')
@endsection
