<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <style>
        /* Thêm các tùy chỉnh CSS của bạn ở đây */
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
        }

        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
        }

        .sidebar-heading {
            font-weight: bold;
            font-size: 1.2rem;
            color: #212529;
        }

        .sidebar-link {
            color: #212529;
        }

        .sidebar-link:hover {
            color: #007bff;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
        }

        footer a {
            color: #ffffff;
        }

        footer a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark p-3">
        <a class="navbar-brand" href="#">Dashboard - Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cài đặt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid ">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h5 class="sidebar-heading p-3 ">Menu</h5>
                    <ul class="nav flex-column  ">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-box-open"></i> Quản lý sản phẩm</a>
                        </li>
                        <li class="nav-item">
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
                            <a class="nav-link" href="#"><i class="fas fa-hamburger"></i> Quản lý món ăn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-store"></i> Quản lý chi nhánh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Thống kê</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container mt-4">
                    <h1 class="mb-4">Chào mừng bạn đến với trang dashboard!</h1>
                    <p>Ở đây, bạn có thể thực hiện các hoạt động quản lý và theo dõi tình hình của hệ thống.</p>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom text-lg-start bg-dark text-white">

        <div class="p-2">
            <div class="text-md-left">
                <p class="mb-0"> &copy; Copyright Nhóm G - Đồ án Back End 2</p>

            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>