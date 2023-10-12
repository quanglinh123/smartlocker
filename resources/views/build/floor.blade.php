@extends('welcome')
@section('main')
    <div class="main">
        <a class="add" href="">Thêm tầng mới</a>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col ">Tầng</div>
                <div class="col ">Mô tả</div>
            </li>
            @foreach ($floor as $row)
                <li class="table-row">
                    <div class="col">{{ $row->floor_name }}</div>
                    <div class="col">{{ $row->floor_detail }}</div>
                </li>
            @endforeach
        </ul>
        <div>
        @endsection
