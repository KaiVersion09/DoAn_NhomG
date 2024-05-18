@extends('dashboardAdmin')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Danh Mục</h2>
            <div class="table-responsive">
                <a href="{{ route('addcategories') }}" class="btn btn-secondary mb-2">Add</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Danh Mục</th>
                            <th scope="col">Tên Danh Mục</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->categories_id }}</td>
                            <td>{{ $category->categories_name }}</td>
                            <td>{{ $category->categories_description }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                            <a href="{{ route('updatecategories', ['categories_id' => $category->categories_id]) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ route('deletecategories', ['categories_id' => $category->categories_id]) }}" class="btn btn-danger">Xóa</a>            
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links () }}
                </div>
            </div>

        </div>

        
    </div>
</div>

@endsection
