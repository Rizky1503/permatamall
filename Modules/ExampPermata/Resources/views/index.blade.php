@extends('examppermata::layouts.master')

@section('content')

<section class="development">
    <div class="container">
      <div class="comparison">
        <table>
          <thead>
            <tr>
              <th rowspan="3" style="    background: #3eb960;color: #fff;text-align: center;">
                <h1>Daftar Module</h1>
              </th>
              <th class="qbse">
                Test online Gratis PermataMall
              </th>
              <th colspan="1" class="qbo">
                Test online Berbayar PermataMall
              </th>
            </tr>
            <tr>
              <th class="compare-heading">
                Gratis
              </th>
              <th class="compare-heading">
                Berbayar
              </th>
            </tr>
            <tr>
              <th class="price-info">
                <div class="price-now"><span>Rp.<span class="price-small">.0</span></span> /unlimited</div>
                <div><a href="{{ route('ExampPermata.token_berlangganan',[encrypt('gratis'), base64_encode(now())]) }}" class="price-buy">Daftar <span class="hide-mobile">Sekarang</span></a></div>
              </th>
              <th class="price-info">
                <div class="price-now"><span>Rp. 3<span class="price-small">00.000</span></span> /tahun</div>
                <div><a href="{{ route('ExampPermata.token_berlangganan',[encrypt('berbayar'), base64_encode(now())]) }}" class="price-buy">Registrasi <span class="hide-mobile">Sekarang</span></a></div>
              </th>              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td colspan="4">Seperate business from personal spending</td>
            </tr>
            <tr class="compare-row">
              <td>Test Online (SBMPTN & TRYOUT)</td>
              <td><span class="tickblue">✔</span></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td>Skor</td>
              <td><span class="tickblue">✔</span></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr class="compare-row">
              <td>Saran (Les Private, Bimbel offline)</td>
              <td><span class="tickblue">✔</span></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td>video Pembelajaran</td>
              <td></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr class="compare-row">
              <td>Passing Grade</td>
              <td></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td>Report / Analisis</td>
              <td></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>            
            <tr class="compare-row">
              <td>Saran Universitas</td>
              <td></td>
              <td><span class="tickblue">✔</span></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>            
            <tr>
              <td>Soal</td>
              <td>Terbatas</td>
              <td>Unlimited</td>
            </tr>
          </tbody>
        </table>
      </div>      
    </div>
</section>
@stop
@section('script')
<style type="text/css">
.comparison {
  margin:0 auto;
  font:13px/1.4;
  text-align:center;
}

.comparison table {
  width:100%;
  border-collapse: collapse;
  border-spacing: 0;
  table-layout: fixed;
  border-bottom:1px solid #CCC;
}

.comparison td, .comparison th {
  border-right:1px solid #CCC;
  empty-cells: show;
  padding:10px;
}

.compare-heading {
  font-size:18px;
  font-weight:bold !important;
  border-bottom:0 !important;
  padding-top:10px !important;
}

.comparison tbody tr:nth-child(odd) {
  display:none;
}

.comparison .compare-row {
  background:#F5F5F5;
}

.comparison .tickblue {
  color:#0078C1;
}

.comparison .tickgreen {
  color:#009E2C;
}

.comparison th {
  font-weight:normal;
  border-bottom:1px solid #CCC;
}

.comparison tr td:first-child {
  text-align:left;
}
  
.comparison .qbse, .comparison .qbo, .comparison .tl {
  color:#FFF;
  padding:10px;
  font-size:13px;
  border-right:1px solid #CCC;
  border-bottom:0;
}

.comparison .tl2 {
  border-right:0;
}

.comparison .qbse {
  background:#0078C1;
  border-top-left-radius: 3px;
  border-left:0px;
}

.comparison .qbo {
  background:#009E2C;
  border-top-right-radius: 3px;
  border-right:0px;
}

.comparison .price-info {
  padding:5px 15px 15px 15px;
}

.comparison .price-was {
  color:#999;
  text-decoration: line-through;
}

.comparison .price-now, .comparison .price-now span {
  color:#3eb960;
}

.comparison .price-now span {
  font-size:32px;
}

.comparison .price-small {
    font-size: 18px !important;
    position: relative;
    top: -11px;
    left: 2px;
}

.comparison .price-buy {
  background:#3eb960;
  padding:10px 20px;
  font-size:12px;
  display:inline-block;
  color:#FFF;
  text-decoration:none;
  border-radius:3px;
  text-transform:uppercase;
  margin:5px 0 10px 0;
}

.comparison .price-try {
  font-size:12px;
}

.comparison .price-try a {
  color:#202020;
}

@media (max-width: 767px) {
  .comparison td:first-child, .comparison th:first-child {
    display: none;
  }
  .comparison tbody tr:nth-child(odd) {
    display:table-row;
    background:#F7F7F7;
  }
  .comparison .row {
    background:#FFF;
  }
  .comparison td, .comparison th {
    border:1px solid #CCC;
  }
  .price-info {
  border-top:0 !important;
  
}
  
}

@media (max-width: 639px) {
  .comparison .price-buy {
    padding:5px 10px;
  }
  .comparison td, .comparison th {
    padding:10px 5px;
  }
  .comparison .hide-mobile {
    display:none;
  }
  .comparison .price-now span {
  font-size:16px;
}

.comparison .price-small {
    font-size: 16px !important;
    top: 0;
    left: 0;
}
  .comparison .qbse, .comparison .qbo {
    font-size:12px;
    padding:10px 5px;
  }
  .comparison .price-buy {
    margin-top:10px;
  }
  .compare-heading {
  font-size:13px;
}
}
</style>
@endsection