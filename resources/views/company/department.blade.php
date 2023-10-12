@extends('welcome')
@section('main')
    <div class="main">
        <h2>Danh sách phòng ban</h2>
        <a class="add" href="{{ route('adddepartment') }}">Thêm phòng ban mới</a>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col ">Số thứ tự</div>
                <div class="col ">Phòng ban</div>
            </li>
            @foreach ($department as $row)
                <li class="table-row">
                    <div class="col">{{ $row->department_id }}</div>
                    <div class="col">{{ $row->department_name }}</div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
