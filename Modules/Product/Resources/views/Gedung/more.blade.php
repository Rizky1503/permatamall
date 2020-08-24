@extends('layouts.FrontEnd')

@section('content')

<div class="container" style="margin-top: 20px;">
  <div class="col-md-4">
    <!-- start slider -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">  
      <div class="item active">
        <img src="https://ecs7.tokopedia.net/img/cache/700/product-1/2019/8/8/731372/731372_4f27e0c9-0b59-4f1b-be69-8736cf7c4e13_1500_1500.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://ecs7.tokopedia.net/img/cache/700/product-1/2019/8/8/731372/731372_4f27e0c9-0b59-4f1b-be69-8736cf7c4e13_1500_1500.jpg" alt="Chicago" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://ecs7.tokopedia.net/img/cache/700/product-1/2019/8/8/731372/731372_4f27e0c9-0b59-4f1b-be69-8736cf7c4e13_1500_1500.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>  
<!-- slider end -->
<!--detail -->

<!--detail end-->
  <div style="margin-bottom: 60px;">
    
  </div>
</div>
@endsection
@section('script')
@endsection
