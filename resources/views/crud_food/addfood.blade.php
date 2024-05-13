@extends('dashboardAdmin')
@section('content')
<div class="container mt-2 p-4 ">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header text-center">Thêm Món Ăn</h2>
                <div class="card-body">
                    <form method="post" action="{{ route('food') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="food_name" class="col-sm-4 col-form-label">Tên Món Ăn:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="food_name" id="food_name" placeholder="Nhập Tên Món Ăn">
                                @error('food_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="categories_id" class="col-sm-4 col-form-label">Danh Mục:</label>
                            <div class="col-sm-8">
                                <select class="form-select p-2" name="categories_id" id="categories_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
                                    @endforeach
                                </select>

                                @error('categories_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="food_price" class="col-sm-4 col-form-label">Giá:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="food_price" id="food_price" placeholder="Nhập Giá">
                                @error('food_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="food_description" class="col-sm-4 col-form-label">Mô Tả:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="food_description" id="food_description" rows="3" placeholder="Nhập Mô Tả"></textarea>
                                @error('food_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="food_avatar" class="col-sm-4 col-form-label">Chọn Ảnh:</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" name="food_avatar" id="food_avatar">
                                @error('food_avatar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4 text-end">
                                <button type="submit" class="btn btn-dark btn-block">Thêm Món Ăn</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection