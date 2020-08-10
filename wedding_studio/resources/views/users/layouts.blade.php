<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light"  style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png') }}" alt="Logo" style="width:100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Trang chủ</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Album</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Bảng giá</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Liên hệ</a>
            </li>
          </ul>
        </div>
      </nav>

            @yield('content')

      <div class="footer">
        <div class="footer-left">
            <div class="footer-left1">
                <h3>GIỚI THIỆU</h3>
                    <p>Với hơn 100 nhân viên tư vấn trên mọi phương diện, không chỉ là hướng dẫn và xử lý các vấn đề từ Haravan, chúng tôi luôn mong cùng chia sẻ các kinh nghiệm giúp bạn bán được nhiều hàng hơn.</p>
                    <p><i class="fas fa-home"></i>28 Nguyễn Tri Phương,Tp. Huế</p>
                    <p><i class="far fa-envelope"></i>hi@haravan.com</p>
                    <p><i class="fas fa-phone-alt"></i>0702420337</p>
            </div>
            <div class="footer-left2">
                <h3>LIÊN KẾT</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-right1">
                <h3>ĐĂNG KÍ NHẬN TIN</h3>
                <input type="text" name="" id="" placeholder="Nhập email của bạn">
                <div class = "input"><i>Hãy nhập email của bạn vào đây để nhận tin</i></div>
                <div class = "footer-icon">
                    <button><i class="fab fa-facebook-f"></i></button>
                    <button><i class="fab fa-twitter"></i></button>
                    <button><i class="fab fa-google-plus-g"></i></button>
                    <button><i class="fab fa-youtube"></i></button>
                    <button><i class="fab fa-instagram"></i></button>
                </div>
            </div>
            <div class="footer-right2">
                <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>
                <img src="" alt="">
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/607b7b9d04.js" crossorigin="anonymous"></script>

</body>
</html>


