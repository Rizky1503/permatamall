@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/bo.png') !!}');">
    <div class="container">
        <center>
            <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 60px;">Bimbel Ganesha {{ $kota }}</p>
        </center>
    </div>
</div>
<div class="container" style="padding-bottom: 30px; padding-top: 30px;">
    <div class="row">
      <div class="col-md-3">
        <div class="form-filter">
          <span style="font-size: 16px;font-weight: bold;">Tingkat</span>
          <br>
          <div style="margin-top: 15px;">
            <label class="container-filter">SD
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
            <label class="container-filter">SMP
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>
            <label class="container-filter">SMA
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>        
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <span style="background-color: #3eb960;color: #3eb960; font-size: 25px;">|</span>
            <span style="font-size: 20px;">{{ $kota }} Kalideres II</span>
          </div>
          <div class="col-md-6">
            <div class="blog-card">
                <div class="meta">
                  <div class="photo" style="background-image: url({!! asset('public/images/contoh-bimbel.jpg') !!})"></div>
                  <ul class="details">
                    <li class="author"><a href="#">Bimbel Ganesha</a></li>
                    <li class="tags">
                      <ul>
                        <li><a href="#">BOGOR</a></li>
                        <li><a href="#">JAKARTA</a></li>
                        <li><a href="#">SURABAYA</a></li>
                        <li><a href="#">BANDUNG</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="description">
                  <h1>Paket SD 1 Tahun</h1>
                  <h2>Rp. 1.000.000</h2>
                  <p>Harga Paket berlaku hanya daftar melalui permatamall.com</p>
                  <p class="read-more">
                    <a href="{{ route('Bimbel.payment') }}">Order Sekarang</a>
                  </p>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="blog-card">
                <div class="meta">
                  <div class="photo" style="background-image: url({!! asset('public/images/contoh-bimbel.jpg') !!})"></div>
                  <ul class="details">
                    <li class="author"><a href="#">Bimbel Ganesha</a></li>
                    <li class="tags">
                      <ul>
                        <li><a href="#">BOGOR</a></li>
                        <li><a href="#">JAKARTA</a></li>
                        <li><a href="#">SURABAYA</a></li>
                        <li><a href="#">BANDUNG</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="description">
                  <h1>Paket SMA 1 Tahun</h1>
                  <h2>Rp. 1.000.000</h2>
                  <p>Harga Paket berlaku hanya daftar melalui permatamall.com</p>
                  <p class="read-more">
                    <a href="{{ route('Bimbel.payment') }}">Order Sekarang</a>
                  </p>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="blog-card">
                <div class="meta">
                  <div class="photo" style="background-image: url({!! asset('public/images/contoh-bimbel.jpg') !!})"></div>
                  <ul class="details">
                    <li class="author"><a href="#">Bimbel Ganesha</a></li>
                    <li class="tags">
                      <ul>
                        <li><a href="#">BOGOR</a></li>
                        <li><a href="#">JAKARTA</a></li>
                        <li><a href="#">SURABAYA</a></li>
                        <li><a href="#">BANDUNG</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="description">
                  <h1>Paket SMA 6 Bulan</h1>
                  <h2>Rp. 1.000.000</h2>
                  <p>Harga Paket berlaku hanya daftar melalui permatamall.com</p>
                  <p class="read-more">
                    <a href="{{ route('Bimbel.payment') }}">Order Sekarang</a>
                  </p>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="blog-card">
                <div class="meta">
                  <div class="photo" style="background-image: url({!! asset('public/images/contoh-bimbel.jpg') !!})"></div>
                  <ul class="details">
                    <li class="author"><a href="#">Bimbel Ganesha</a></li>
                    <li class="tags">
                      <ul>
                        <li><a href="#">BOGOR</a></li>
                        <li><a href="#">JAKARTA</a></li>
                        <li><a href="#">SURABAYA</a></li>
                        <li><a href="#">BANDUNG</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="description">
                  <h1>Paket SD 6 Bulan</h1>
                  <h2>Rp. 1.000.000</h2>
                  <p>Harga Paket berlaku hanya daftar melalui permatamall.com</p>
                  <p class="read-more">
                    <a href="{{ route('Bimbel.payment') }}">Order Sekarang</a>
                  </p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>    
</div>
@endsection
@section('script')
<style type="text/css">
/* The container */
.container-filter {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-filter input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 4px;
}

/* On mouse-over, add a grey background color */
.container-filter:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-filter input:checked ~ .checkmark {
  background-color: #3eb960;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-filter input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-filter .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 8px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


.form-filter{
  box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
  background: #fff;
  border-radius: 5px;
  padding: 10px 10px 10px 10px;
  margin-bottom: 20px;
}

.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
  margin-bottom: 1.6%;
  background: #fff;
  line-height: 1.4;
  font-family: sans-serif;
  border-radius: 5px;
  overflow: hidden;
  z-index: 0;
}
.blog-card a {
  color: inherit;
}
.blog-card a:hover {
  color: #5ad67d;
}
/*.blog-card:hover .photo {
  -webkit-transform: scale(1.3) rotate(3deg);
          transform: scale(1.3) rotate(3deg);
}*/
.blog-card .meta {
  position: relative;
  z-index: 0;
  height: 200px;
}
.blog-card .photo {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-size: cover;
  background-position: center;
  transition: -webkit-transform .2s;
  transition: transform .2s;
  transition: transform .2s, -webkit-transform .2s;
}
.blog-card .details,
.blog-card .details ul {
  margin: auto;
  padding: 0;
  list-style: none;
}
.blog-card .details {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -100%;
  margin: auto;
  transition: left .2s;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 10px;
  width: 100%;
  font-size: .9rem;
}
.blog-card .details a {
  -webkit-text-decoration: dotted underline;
          text-decoration: dotted underline;
}
.blog-card .details ul li {
  display: inline-block;
}
.blog-card .details .author:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f007";
}
.blog-card .details .date:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f133";
}
.blog-card .details .tags ul:before {
  font-family: FontAwesome;
  content: "\f02b";
  margin-right: 10px;
}
.blog-card .details .tags li {
  margin-right: 2px;
}
.blog-card .details .tags li:first-child {
  margin-left: -4px;
}
.blog-card .description {
  padding: 1rem;
  background: #fff;
  position: relative;
  z-index: 1;
}
.blog-card .description h1,
.blog-card .description h2 {
  font-family: Poppins, sans-serif;
}
.blog-card .description h1 {
  line-height: 1;
  margin: 0;
  font-size: 1.7rem;
}
.blog-card .description h2 {
  font-size: 1rem;
  font-weight: 300;
  text-transform: uppercase;
  color: #a2a2a2;
  margin-top: 5px;
}
.blog-card .description .read-more {
  text-align: right;
}
.blog-card .description .read-more a {
  padding: 10px;
  color: #ffffff;
  display: inline-block;
  position: relative;
  background: #3eb960;
  font-weight: bold;
}
.blog-card .description .read-more a:after {
  content: "\f061";
  font-family: FontAwesome;
  margin-left: -10px;
  opacity: 0;
  vertical-align: middle;
  transition: margin .3s, opacity .3s;
}
.blog-card .description .read-more a:hover:after {
  margin-left: 5px;
  opacity: 1;
}
.blog-card p {
  position: relative;
  margin: 1rem 0 0;
}
.blog-card p:first-of-type {
  margin-top: 1.25rem;
}
.blog-card p:first-of-type:before {
  content: "";
  position: absolute;
  height: 5px;
  background: #5ad67d;
  width: 35px;
  top: -0.75rem;
  border-radius: 3px;
}
.blog-card:hover .details {
  left: 0%;
}
@media (min-width: 640px) {
  .blog-card {
    flex-direction: row;
    max-width: 700px;
  }
  .blog-card .meta {
    flex-basis: 40%;
    height: auto;
  }
  .blog-card .description {
    flex-basis: 60%;
  }
  .blog-card .description:before {
    -webkit-transform: skewX(-3deg);
            transform: skewX(-3deg);
    content: "";
    background: #fff;
    width: 30px;
    position: absolute;
    left: -10px;
    top: 0;
    bottom: 0;
    z-index: -1;
  }
}
  
</style>
@endsection
