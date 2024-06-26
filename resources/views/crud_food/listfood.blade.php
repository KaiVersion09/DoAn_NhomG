@extends('dashboardAdmin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Món Ăn</h2>
            <div class="table-responsive">
                <a href="{{ route('food') }}" class="btn btn-secondary mb-2">Thêm</a>
                <!-- Form tìm kiếm -->
                <form action="{{ route('food.find') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên món ăn..." value="{{ request()->get('name') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                            <a href="{{ route('food.list') }}" class="btn btn-secondary ml-2">Hiển thị tất cả</a>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tên Món</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục món</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($foods as $food)
                        <tr>
                            <td>{{ $food->food_name }}</td>
                            <td><img src="{{ asset($food->food_avatar) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{ $food->categories_id }}</td>
                            <td>{{ $food->food_price }}</td>
                            <td>{{ $food->food_description }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                                <a href="{{ route('food.updateFood', ['food_id' => $food->food_id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('food.deleteFood', ['food_id' => $food->food_id]) }}" class="btn btn-danger ml-2">Delete</a>
                                <a href="{{ route('foods.show', ['food_id' => $food->food_id]) }}" class="btn btn-primary  ml-2">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
