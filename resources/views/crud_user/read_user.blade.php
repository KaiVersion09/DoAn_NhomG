@extends('dashboardAdmin')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Chi Tiết Người Dùng</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset($user->avatar) }}" alt="Avatar" style="max-width: 150px; max-height: 150px;">
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $user->name }}</h4>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <!-- Thêm thông tin khác nếu cần -->
                        </div>
                    </div>
                    <div class="text-center mb-3"> <!-- Thêm class text-center để căn giữa -->
                        <a href="{{ route('user.list') }}" class="btn btn-secondary">Quay lại danh sách</a> <!-- Loại bỏ class text-center từ nút -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
