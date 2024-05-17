@extends('dashboardAdmin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Voucher</h2>
            <a href="{{ route('voucher') }}" class="btn btn-secondary mb-2">Add</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Discount Percentage</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Code</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->voucher_id }}</td>
                            <td>{{ $voucher->voucher_name }}</td>
                            <td>{{ $voucher->discount_percentage }}%</td>
                            <td>{{ $voucher->start_date }}</td>
                            <td>{{ $voucher->end_date }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td class="text-center" style="padding-top: 10px;">
                                <a href="{{ route('voucher.edit', ['id' => $voucher->voucher_id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('voucher.deleteVoucher', ['voucher_id' => $voucher->voucher_id]) }}" class="btn btn-danger ml-2" onclick="return confirm('Bạn có chắc chắn muốn xóa voucher này?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $vouchers->links() }}
                </div>
            </div>

        </div>

    </div>
</div>
@endsection