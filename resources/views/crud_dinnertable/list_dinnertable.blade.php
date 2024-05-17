@extends('dashboardAdmin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{ Route('dinnertable.add') }}" class="btn btn-success">Add</a>
        </div>
    </div>
</div>
@endsection