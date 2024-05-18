@extends('dashboard')

@section('content')
<div class="mt-5" style="max-width: 600px; margin: auto; padding: 16px;">
  <div style="border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">
    <div style="background-color: #343a40; color: white; text-align: center; padding: 16px; font-size: 1.25rem;">
      Đặt Bàn
    </div>
    <div style="padding: 16px;">
      <form method="GET" action="{{ route('bookings.create') }}" class="mb-4">
        @csrf
        <div style="margin-bottom: 16px;">
          <label for="branch" style="display: block; margin-bottom: 8px; font-weight: bold;">Chi nhánh:</label>
          <select id="branch" name="branch_id" style="width: 100%; padding: 8px; font-size: 1rem; border-radius: 4px; border: 1px solid #ccc;">
            <option value="">Chọn chi nhánh</option>
            @foreach($branches as $branch)
            <option value="{{ $branch->id }}" {{ request('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->branches_name }}</option>
            @endforeach
          </select>

        </div>
      </form>

      <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <input type="hidden" name="branch_id" value="{{ request('branch_id') }}">

        <div style="margin-bottom: 16px;">
          <label for="table" style="display: block; margin-bottom: 8px; font-weight: bold;">Bàn:</label>
          <select id="table" name="table_id" style="width: 100%; padding: 8px; font-size: 1rem; border-radius: 4px; border: 1px solid #ccc;">
            <option value="">Chọn bàn</option>
            @foreach($tables as $table)
            <option value="{{ $table->id }}">{{ $table->name }}</option>
            @endforeach
          </select>
        </div>
        <div style="margin-bottom: 16px;">
          <label for="booking_time" style="display: block; margin-bottom: 8px; font-weight: bold;">Thời gian đặt bàn:</label>
          <input type="datetime-local" id="booking_time" name="booking_time" style="width: 100%; padding: 8px; font-size: 1rem; border-radius: 4px; border: 1px solid #ccc;">
        </div>
        <div style="margin-bottom: 16px;">
          <label for="number_of_guests" style="display: block; margin-bottom: 8px; font-weight: bold;">Số lượng khách:</label>
          <input type="number" id="number_of_guests" name="number_of_guests" min="1" style="width: 100%; padding: 8px; font-size: 1rem; border-radius: 4px; border: 1px solid #ccc;">
        </div>
        <button type="submit" style="width: 100%; padding: 12px; font-size: 1rem; border-radius: 4px; border: none; background-color: #343a40; color: white; cursor: pointer; transition: background-color 0.3s ease;">Đặt bàn</button>
      </form>
    </div>
  </div>
</div>
@endsection