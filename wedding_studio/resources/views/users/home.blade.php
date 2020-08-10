@extends('users.layouts')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('image/bg-1.png') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="bg-h1">Wedding Studio</h1>
          <h3 class="bg-h3">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('image/bg-2.jpg') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="bg-h1">Wedding Studio</h1>
          <h3 class="bg-h3">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('image/bg-3.jpg') }}" class="d-block w-100" style="height: 700px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="bg-h1">Wedding Studio</h1>
            <h3 class="bg-h3">Dịch vụ chụp ảnh cưới chuyên nghiệp</h3>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div>
    <div>
        <h1>CÁC DỊCH VỤ CHÍNH</h1>
        <p>Dịch vụ chuyên nghiệp với Wedding Studio – hãy liên hệ sớm với chúng tôi để nhận được nhiều ưu đãi!</p>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('image/service_1.png') }}" class="rounded mx-auto d-block" style="width: 70px; height: 70px" alt="...">
                <div class="card-body">
                    <h2 class="service-h2">abccc</h2>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
    </div>
  </div>




@endsection
