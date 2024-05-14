@extends('dashboardAdmin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{ Route('staff.add') }}" class="btn btn-success">Add</a>
            <h2 class="card-title text-center mb-4">Danh Sách Nhân Viên</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Wage</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>{{ $staff->id }}</td>
                            <td>
                                @if($staff->avatar)
                                <img src="{{ asset($staff->avatar) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                                @else
                                <img src="{{ asset('default-avatar.png') }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                                @endif
                            </td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ $staff->wage }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                                <a href="{{ route('staff.updateStaff', ['id' => $staff->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('staff.delete', ['id' => $staff->id]) }}" class="btn btn-danger ml-2">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $staffs->links() }}
                </div>
            </div>

        </div>

    </div>
</div>
@endsection