@extends('dashboardAdmin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{ Route('dinnertable.add') }}" class="btn btn-success">Add</a>
            <h2 class="card-title text-center mb-4">Danh Sách Bàn Ăn</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên Bàn</th>
                            <th scope="col">Số ghê</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>
                                @if($table->image)
                                <img src="{{ asset($table->image) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                                @else
                                <img src="{{ asset('default-avatar.png') }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                                @endif
                            </td>
                            <td>{{ $table->name }}</td>
                            <td>{{ $table->chair }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                                <a href="{{ route('table.update', ['id' => $table->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('table.delete', ['id' => $table->id]) }}" class="btn btn-danger ml-2">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $tables->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection