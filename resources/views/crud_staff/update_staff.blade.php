@extends('dashboardAdmin')
@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <form method="post" action="{{ route('staff.postUpdateStaff') }}" enctype="multipart/form-data">
        @csrf
        <input name="id" type="hidden" value="{{ $staff->id }}">
        <div class="mb-2 row">
          <label for="name" class="col-sm-4 col-form-label">Tên đăng nhập:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" id="name" value="{{ $staff->name }}">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="password" class="col-sm-4 col-form-label">Mật khẩu:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập Mật Khẩu">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="password_confirmation" class="col-sm-4 col-form-label">Nhập lại mật khẩu:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nhập Lại Mật Khẩu">
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="email" class="col-sm-4 col-form-label">Email:</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="email" id="email" value="{{ $staff->email }}">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="phone" class="col-sm-4 col-form-label">Số Điện Thoại:</label>
          <div class="col-sm-8">
            <input type="phone" class="form-control" name="phone" id="phone" value="{{ $staff->phone }}">
            @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="wage" class="col-sm-4 col-form-label">Lương:</label>
          <div class="col-sm-8">
            <input type="wage" class="form-control" name="wage" id="wage" value="{{ $staff->wage }}">
            @if ($errors->has('wage'))
            <span class="text-danger">{{ $errors->first('wage') }}</span>
            @endif
          </div>
        </div>
        <div class="mb-2 row">
          <label for="avatar" class="col-sm-4 col-form-label">Chọn ảnh:</label>
          <div class="col-sm-8">
            @if($staff->avatar)
              <img src="{{ asset($staff->avatar) }}" alt="Avatar hiện tại" style="max-width: 100px; max-height: 100px;" class="mb-2">
            @else
              <img src="{{ asset('default-avatar.png') }}" alt="Avatar mặc định" style="max-width: 100px; max-height: 100px;" class="mb-2">
            @endif
            <input type="file" class="form-control-file" name="avatar" id="avatar">
            @if ($errors->has('avatar'))
            <span class="text-danger">{{ $errors->first('avatar') }}</span>
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
