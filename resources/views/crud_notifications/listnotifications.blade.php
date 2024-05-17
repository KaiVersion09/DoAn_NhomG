@extends('dashboardAdmin')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Thông Báo</h2>
            <div class="table-responsive">
            <a href="{{ route('addnotifications') }}" class="btn btn-secondary mb-2">Add</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Thông Báo</th> 
                            <th scope="col">Nội Dung</th> 
                            <th scope="col">Thời Gian</th> 
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->notifications_id }}</td>
                            <td>{{ $notification->notifications_content }}</td>
                            <td>{{ $notification->notifications_time }}</td>
                            <td class="text-center" style="padding-top: 10px;">
           
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $notifications->links () }}
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
