@extends('dashboard')
@section('content')
<div class="p-3 mt-2">
    <div class="row">
        @foreach ($foods as $food)
        <div class="col-md-2 mb-2">
            <div class="card bg-dark text-white h-100">
                <img src="{{ asset($food->food_avatar) }}" class="card-img-top" alt="{{ $food->food_name }}" style="height: 100px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $food->food_name }}</h5>
                    <p class="card-text">{{ $food->food_description }}</p>
                    <div class="mt-auto">
                        <p class="card-text text-white">Giá: ${{ $food->food_price }}</p>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="#" class="btn btn-primary btn-sm mr-2">Thêm vào giỏ hàng</a>
                            <a href="{{ route('foods.show', ['food_id' => $food->food_id]) }}" class="btn btn-secondary btn-sm">Chi tiết</a>
                        </div>
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
