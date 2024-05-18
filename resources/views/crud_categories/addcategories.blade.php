@extends('dashboardAdmin')
@section('content')
<div class="container mt-2 p-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header text-center">Thêm Danh Mục</h2>
                <div class="card-body">
                    <form method="post" action="{{ route('addcategories') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="categories_name" class="col-sm-4 col-form-label">Tên Danh Mục:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="categories_name" id="categories_name" placeholder="Nhập Tên Danh Mục">
                                @error('categories_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="categories_description" class="col-sm-4 col-form-label">Mô Tả:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="categories_description" id="categories_description" placeholder="Nhập Mô Tả"></textarea>
                                @error('categories_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4 text-end">
                                <button type="submit" class="btn btn-dark btn-block">Thêm Danh Mục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
