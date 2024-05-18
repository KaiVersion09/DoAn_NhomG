@extends('dashboardAdmin')

@section('content')
<div class="container mt-5">
    <a href="{{ route('add_news') }}" class="btn btn-success mb-3">ADD+</a>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Danh Sách Tin Tức Hiện Tại</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Time</th>
                            <th scope="col">Contents</th>
                            <th scope="col" class="text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="Image" style="max-width: 100px; max-height: 100px;"></td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->content }}</td>
                                <td class="text-center" style="padding-top: 10px;">
                                    <a href="{{ route('updateNews', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('delete_news', ['id' => $item->id]) }}"
                                        class="btn btn-danger ml-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


