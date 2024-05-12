@extends('dashboard')
  @section('content')
  <!-- Form Đăng Nhập -->
  <div class="container mt-5">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4">
            <h1>CHÀO MỪNG</h1>
            <h1>ĐẾN VỚI</h1>
            <h1>NHÀ HÀNG CỦA TÔI</h1>
        </div>
        <div class="col-md-5">
            <div class="card">
                <h2 class="card-header text-center">Đăng nhập</h2>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Đăng nhập</button>
                    </form>
                    <div class="text-center mt-2">
                        <a href="#">Chưa có tài khoản?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection