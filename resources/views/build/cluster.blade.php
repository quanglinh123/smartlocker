@extends('welcome')
@section('main')
    <div class="main">
        <a class="add" href="{{ route('addcluster')}}">Thêm cụm tủ mới</a>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col ">Tên Cụm tủ</div>
                <div class="col ">Tầng</div>
            </li>
            @foreach ($cluster as $row)
                <li class="table-row">
                    <div class="col">{{ $row->cluster_name }}</div>
                    <div class="col">{{ $row->floor_name }}</div>
                </li>
            @endforeach
        </ul>
        <div>
        @endsection
