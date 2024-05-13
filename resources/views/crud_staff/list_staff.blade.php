@extends('dashboardAdmin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Nhân Viên</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>


                    <tbody>  
                        <tr>
                            <td></td>
                            <td><img src="" alt="Avatar" style="max-width: 100px; max-height: 100px;"></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="padding-top: 10px;">
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger ml-2">Delete</a>
                                <a href="{{ Route('staff.add') }}" class="btn btn-success ml-2">Add</a>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="d-flex justify-content-center mt-4">
                </div>
            </div>

        </div>

    </div>
</div>
@endsection