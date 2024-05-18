@extends('dashboardAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <!-- Thêm lớp justify-content-center để căn giữa dòng -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Tin Tức</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addNews') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input id="title" type="text" class="form-control" name="title" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội Dung</label>
                            <textarea id="content" class="form-control" name="content" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Ảnh Đính Kèm</label>
                            <input id="image" type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group text-center"> <!-- Thêm lớp text-center để căn giữa nội dung của form -->
                            <button type="submit" class="btn btn-primary">
                                Thêm Tin Tức
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
