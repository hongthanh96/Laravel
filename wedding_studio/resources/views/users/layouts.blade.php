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
        <div class="collapse navbar-collapse row" id="collapsibleNavbar">
            <div class="col-9">
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
                          <a class="dropdown-item" href="#">Quay phóng sự cưới</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Thuê trang phục cưới</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Trang điểm cô dâu</a>
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
            <div class="col-3 row">
                    <div class="col-6">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Đăng nhập</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Đăng kí</a>
                    </div>
            </div>

        </div>
      </nav>

            @yield('content')

      <div class="footer">
        <div class="footer-left">
            <div class="footer-left1">
                <h3>GIỚI THIỆU</h3>
                <p>Wedding Studio luôn được khẳng định là một thương hiệu về dịch vụ ảnh cưới và chụp ảnh cưới trọn gói chuyên nghiệp cùng với đội ngũ thợ chụp ảnh và chuyên gia trang điểm và nhân viên trẻ, năng động, sáng tạo, tận tình, chu đáo.</p>
                    <p><i class="fas fa-home"></i>28 Nguyễn Tri Phương,Tp. Huế</p>
                    <p><i class="far fa-envelope"></i>hi@weddingstudio.com</p>
                    <p><i class="fas fa-phone-alt"></i>0702420339</p>
            </div>
            <div class="footer-left2">
                <h3>LIÊN KẾT</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Album</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Bảng giá</a></li>
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


