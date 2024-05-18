<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Đờ gút food</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container-full-height {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#">Đờ gút food</a>
        <form class="form-inline ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-light my-2 mr-sm-2" type="submit">Tìm kiếm</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thực đơn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đặt bàn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
            </ul>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="#">Đờ gút food</a>
    <form class="form-inline ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
      <button class="btn btn-outline-light my-2 mr-sm-2  " type="submit">Tìm kiếm</button>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-auto" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Thực đơn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Đặt bàn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tin tức</a>
        </li>
      </ul>
    </div>
    @guest
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="#"><span class="fas fa-shopping-cart">Giỏ hàng</span></a>
      <a class="nav-item nav-link" href="#"><span class="fas fa-user-alt">Đăng Nhập</span></a>	
    </div>
                @else
                <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="#"><span class="fas fa-shopping-cart">Giỏ hàng</span></a>
      <a class="nav-item nav-link" href="{{ Route('logout') }}"><span class="fas fa-user-alt">Đăng Xuất</span></a>	
    </div>
                @endguest

  </nav>
    @yield('content')
    <footer class="text-center fixed-bottom text-lg-start bg-dark text-white p-3">
    <div class="row justify-content-center text-md-center">
    <div class="col-md-4">
        <p><span><i class="fas fa-map-marker-alt"></i></span> Địa chỉ: 123 Đường ABC, Quận XYZ, TP. HCM</p>
    </div>
    <div class="col-md-4">
        <p><span><i class="fas fa-phone-alt"></i></span> Hotline: 0123 456 789</p>
    </div>
    <div class="col-md-4">
        <p>Hãy liên kết với chúng tôi</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="text-white mr-3"><span class="fab fa-facebook-f"></span></a>
            <a href="#" class="text-white mr-3"><span class="fab fa-tiktok"></span></a>
            <a href="#" class="text-white"><span class="fab fa-instagram"></span></a>

        </div>
        @guest
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="#"><span class="fas fa-shopping-cart"></span> Giỏ hàng</a>
            <a class="nav-item nav-link" href="#"><span class="fas fa-user-alt"></span> Đăng Nhập</a>
        </div>
        @else
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="#"><span class="fas fa-shopping-cart"></span> Giỏ hàng</a>
            <a class="nav-item nav-link" href="#"><span class="fas fa-user-alt"></span> Người dùng</a>
        </div>
        @endguest

    </nav>
    <div class="full-height">
        <main class="p-2">
        @yield('content')
        </main>
        <footer class="bg-dark text-white text-center text-lg-start p-3">
    
                <div class="row justify-content-center text-md-center">
                    <div class="col-md-4">
                        <p><span><i class="fas fa-map-marker-alt"></i></span> Địa chỉ: 123 Đường ABC, Quận XYZ, TP.
                            HCM</p>
                    </div>
                    <div class="col-md-4">
                        <p><span><i class="fas fa-phone-alt"></i></span> Hotline: 0123 456 789</p>
                    </div>
                    <div class="col-md-4">
                        <p>Hãy liên kết với chúng tôi</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-white mr-3"><span class="fab fa-facebook-f"></span></a>
                            <a href="#" class="text-white mr-3"><span class="fab fa-tiktok"></span></a>
                            <a href="#" class="text-white"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <hr class="my-2 bg-white">
                <div class="col-md-12 text-md-left p-2">
                    <p class="mb-0">&copy; Copyright Nhóm G - Đồ án Back End 2</p>
                </div>
   
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
