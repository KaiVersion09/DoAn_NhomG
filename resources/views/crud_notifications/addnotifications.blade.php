@extends('dashboardAdmin')
@section('content')
<div class="container mt-2 p-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header text-center">Thêm Thông Báo</h2> 
                <div class="card-body">
                    <form method="post" action="{{ route('addnotifications') }}"> 
                        @csrf
                        <div class="mb-3 row">
                            <label for="notifications_content" class="col-sm-4 col-form-label">Nội Dung:</label> 
                            <div class="col-sm-8">
                                <textarea class="form-control" name="notifications_content" id="notifications_content" placeholder="Nhập Nội Dung"></textarea> 
                                @error('notifications_content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="notifications_time" class="col-sm-4 col-form-label">Thời Gian:</label>
                            <div class="col-sm-8">
                                <input type="datetime-local" class="form-control" name="notifications_time" id="notifications_time">
                                @error('notifications_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4 text-end">
                                <button type="submit" class="btn btn-dark btn-block">Thêm Thông Báo</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
