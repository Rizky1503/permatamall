@extends('examppermata::layouts.master')

@section('content')
<section class="development">
<!--     <div class="blue">
        <img src="{!! asset('public/assets/examp/img/development-shepe-blue.png') !!}" alt="">
    </div>
    <div class="white">
        <img src="{!! asset('public/assets/examp/img/development-shepe-white.png') !!}" alt="">
    </div> -->
    <div class="container">
        <div class="row ">
            <div class="col-md-4 col-sm-4">
                <a href="{{ route('ExampPermata.mapel') }}?spec={{ base64_encode('kosong') }}" style="text-decoration: none">
                	<div class="design-development one">
	                    <i class="material-icons">lightbulb_outline</i>
	                    <h2>Matematika</h2>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp</p>
	                </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
            	<a href="" style="text-decoration: none">
	                <div class="design-development two">
	                    <i class="material-icons">color_lens</i>
	                    <h2>IPA</h2>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp</p>
	                </div>
	            </a>
            </div>            
        </div>
    </div>
</section>
@stop
