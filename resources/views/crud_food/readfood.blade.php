@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h5 class="text-center mb-4">Chi Tiết Món Ăn</h5>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <img src="{{ $foods->food_avatar }}" class="img-fluid mb-3" alt="Hình ảnh">
        </div>
        <div class="col-lg-6">
            <div class="hihi">
                <div class="body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center"> <h2>{{ $foods->food_name }}</h2></li>
                        <li class="list-group-item"><strong>Giá:</strong> {{ $foods->food_price }}</li>
                        <li class="list-group-item"><strong>Mô tả:</strong> {{ $foods->food_description }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb-3"> <!-- Thêm class text-center để căn giữa -->
                        <a href="{{ route('food.list') }}" class="btn btn-secondary">Quay lại danh sách</a> <!-- Loại bỏ class text-center từ nút -->
                    </div>
</div>
@endsection