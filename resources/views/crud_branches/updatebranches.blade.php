@extends('dashboardAdmin')
@section('content')
<div class="container mt-2 p-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header text-center">Cập Nhật Chi Nhánh</h2>
                <div class="card-body">
                    <form method="post" action="{{ route('updatebranches.postUpdatebranches', ['id' => $branch->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="branches_name" class="col-sm-4 col-form-label">Tên Chi Nhánh:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="branches_name" id="branches_name" placeholder="Nhập Tên Chi Nhánh" value="{{ $branch->branches_name }}">
                                @error('branches_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="branches_phone" class="col-sm-4 col-form-label">Số Điện Thoại:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="branches_phone" id="branches_phone" placeholder="Nhập Số Điện Thoại" value="{{ $branch->branches_phone }}">
                                @error('branches_phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="branches_address" class="col-sm-4 col-form-label">Địa Chỉ:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="branches_address" id="branches_address" placeholder="Nhập Địa Chỉ" value="{{ $branch->branches_address }}">
                                @error('branches_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4 text-end">
                                <button type="submit" class="btn btn-dark btn-block">Cập Nhật Chi Nhánh</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
