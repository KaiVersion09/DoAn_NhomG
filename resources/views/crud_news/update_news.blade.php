@extends('dashboardAdmin')

@section('content')
<!-- Form Cập Nhật Thông Tin -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8"> <!-- Tăng kích thước của col-md để form hiển thị rộng hơn -->
      <div class="card">
        <h5 class="card-header text-center">Cập Nhật Tin Tức</h5>
        <div class="card-body">
          <form action="{{ route('updateNews') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}"> <!-- Đổi 'name' thành 'id' và sử dụng value của biến $news -->
            <div class="mb-3 row">
              <label for="title" class="col-sm-4 col-form-label">Tiêu đề:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="content" class="col-sm-4 col-form-label">Nội dung:</label>
              <div class="col-sm-8">
                <textarea class="form-control" name="content" id="content">{{ $news->content }}</textarea>
                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="image" class="col-sm-4 col-form-label">Hình ảnh:</label>
              <div class="col-sm-8">
                <input type="file" class="form-control-file" name="image" id="image">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-8 offset-sm-4 text-end">
                <button type="submit" class="btn btn-primary btn-block">Cập Nhật</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
