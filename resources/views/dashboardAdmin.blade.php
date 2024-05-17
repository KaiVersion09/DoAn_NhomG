<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="#">Dashboard - Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Cài đặt</a>
                </li>
                <li class="nav-item dropdown order-md-0 order-lg-1">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="path_to_avatar_image" alt="Avatar" class="avatar">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Thông tin admin</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar vh-100">
                <div class="sidebar-sticky">
                    <h5 class="sidebar-heading p-3">Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link sidebar-link" href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-box-open"></i> Quản lý sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.list') }}"><i class="fas fa-users"></i> Quản lý người dùng</a>
                            <a class="nav-link" href="#"><i class="fas fa-users"></i> Quản lý người dùng</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Quản lý tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-bell"></i> Quản lý thông báo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-utensils"></i> Quản lý bàn ăn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('food.list') }}"><i class="fas fa-hamburger"></i> Quản lý món ăn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listbranches') }}"><i class="fas fa-store"></i> Quản lý chi nhánh</a>
                            <a class="nav-link" href="#"><i class="fas fa-box"></i> Quản lý danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-store"></i> Quản lý chi nhánh</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-users"></i> Quản lý nhân viên </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Thống kê</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Phần nội dung chính ở đây -->
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="fixed-bottom text-lg-start bg-dark text-white p-2">
            <div class="text-md-left p-2">
                <p class="mb-0"> &copy; Copyright Nhóm G - Đồ án Back End 2</p>

            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>