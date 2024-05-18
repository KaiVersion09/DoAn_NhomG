@extends('dashboardAdmin')
@section('content')
<div class="container mt-2 p-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header text-center">Thêm Voucher</h2>
                <div class="card-body">
                    <form method="post" action="{{ route('voucher.postVoucher') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="voucher_name" class="col-sm-4 col-form-label">Tên Voucher:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="voucher_name" id="voucher_name" placeholder="Nhập Tên Voucher">
                                @error('voucher_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="discount_percentage" class="col-sm-4 col-form-label">Phần Trăm Giảm Giá:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="discount_percentage" id="discount_percentage" placeholder="Nhập Phần Trăm Giảm Giá">
                                @error('discount_percentage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="start_date" class="col-sm-4 col-form-label">Ngày Bắt Đầu:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="start_date" id="start_date">
                                @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="end_date" class="col-sm-4 col-form-label">Ngày Kết Thúc:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="end_date" id="end_date">
                                @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="code" class="col-sm-4 col-form-label">Mã Voucher:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="code" id="code" placeholder="Nhập Mã Voucher">
                                @error('code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-8 offset-sm-4 text-end">
                                <button type="submit" class="btn btn-dark btn-block">Thêm Voucher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection