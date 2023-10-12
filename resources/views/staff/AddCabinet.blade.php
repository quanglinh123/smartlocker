@extends('welcome')
@section('main')
    <div class="main">
        <form class="responsive-table" action="{{route('AddCabinet.action')}}" method ="post">
            @csrf
            <input type="hidden" name="staff_id" value="{{ $staff->staff_id }}">
            <li class="table-header">
                <div class="col "></div>
                <div class="col ">Ô tủ số</div>
                <div class="col ">Cụm tủ</div>
                <div class="col ">Tầng</div>
            </li>
            @foreach ($cabinet as $row)
                <li class="table-row">
                    <div class="col"><input type="radio"  name="cabinet_id" value="{{$row->cabinet_id}}"></div>
                    <div class="col">{{ $row->cabinet_id }}</div>
                    <div class="col">{{ $row->cluster_name }}</div>
                    <div class="col">{{ $row->floor_name }}</div>
                </li>
            @endforeach
            <button> Gán</button>
        </form>
        {{$cabinet->links()}}
    <div>
@endsection
