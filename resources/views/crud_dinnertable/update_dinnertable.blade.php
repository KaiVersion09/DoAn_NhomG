@extends('dashboardAdmin')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{ route('table.postUpdateTable') }}" enctype="multipart/form-data">
                @csrf
                <input name="id" type="hidden" value="{{ $tables->id }}">
                <div class="mb-2 row">
                    <label for="name" class="col-sm-4 col-form-label">Tên Bàn:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $tables->name }}">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="chair" class="col-sm-4 col-form-label">Số Ghế</label>
                    <div class="col-sm-8">
                        <input type="chair" class="form-control" name="chair" id="chair" value="{{ $tables->chair }}">
                        @if ($errors->has('chair'))
                        <span class="text-danger">{{ $errors->first('chair') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch" class="col-sm-4 col-form-label">Chi Nhánh:</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="branch" id="branch">
                            <option value="">Chọn Chi Nhánh</option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $branch->id == $tables->branch_id ? 'selected' : '' }}>{{ $branch->branches_name }}</option>
                            @endforeach
                        </select>
                        @error('branch')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="image" class="col-sm-4 col-form-label">Chọn ảnh:</label>
                    <div class="col-sm-8">
                        @if($tables->image)
                        <img src="{{ asset($tables->image) }}" alt="image hiện tại" style="max-width: 100px; max-height: 100px;" class="mb-2">
                        @else
                        <img src="{{ asset('default-image.png') }}" alt="image mặc định" style="max-width: 100px; max-height: 100px;" class="mb-2">
                        @endif
                        <input type="file" class="form-control-file" name="image" id="image">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-2 row">
                    <div class="col-sm-8 offset-sm-4 text-end">
                        <button type="submit" class="btn btn-dark btn-block">Thay Đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection