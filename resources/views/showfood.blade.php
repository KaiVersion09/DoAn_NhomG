@extends('dashboard')
@section('content')



<div class="p-4 mt-4">
    <div class="row align-items-center bg-light mb-5 p-4">
        <div class="col-md-6 text-md-start mb-4 mb-md-0">
            <h1 class="display-2 p-2">WELCOME MY RESTAURANT</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eos abtempora ullam atque voluptatum, alias numquam ut,</p>
        </div>
        <div class="col-md-6 text-center p-4">
            <img src="restaurant-image.jpg" class="img-fluid" alt="Restaurant Image">
        </div>
    </div>
    <h6 class="mb-4 text-center bg-dark p-2 text-white">Các món ăn</h6>
    <div class="row">
        @foreach ($foods as $food)
        <div class="col-md-3 mb-2">
            <div class="card h-100 bg-dark text-white">
                <img src="{{ asset($food->food_avatar) }}" class="card-img-top" alt="{{ $food->food_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $food->food_name }}</h5>
                    <p class="card-text">{{ $food->food_description }}</p>
                    <p class="card-text text-white text-center">Giá: {{ $food->food_price }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="rating">
                            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                        </div>
                        <a href="#" class="btn btn-dark btn-sm">Thêm Vào Giỏ</a>
                        <a href="#" class="btn btn-secondary btn-sm">Chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $foods->links() }}
    </div>
</div>
@endsection