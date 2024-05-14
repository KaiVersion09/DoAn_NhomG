@extends('dashboardAdmin')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Chi Nhánh</h2>
            <div class="table-responsive">
                <a href="{{ route('addbranches') }}" class="btn btn-secondary mb-2">Add</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Chi Nhánh</th>
                            <th scope="col">Tên Chi Nhánh</th>
                            <th scope="col">Số Điện Thoại Chi Nhánh</th>
                            <th scope="col">Địa Chỉ Chi Nhánh</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td>{{ $branch->branches_id }}</td>
                            <td>{{ $branch->branches_name }}</td>
                            <td>{{ $branch->branches_phone }}</td>
                            <td>{{ $branch->branches_address }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                            <a href="{{ route('updatebranches', ['branches_id' => $branch->branches_id]) }}" class="btn btn-primary btn-sm">Sửa</a>            
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $branches->links() }}
                </div>
            </div>

        </div>

    </div>
</div>


@endsection