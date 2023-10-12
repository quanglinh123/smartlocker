@extends('welcome')
@section('main')
    <div class="main">
        <h2>Lịch sử mở đóng các ô tủ</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col ">Ô tủ</div>
                <div class="col ">Nhân viên sử dụng ô tủ</div>
                <div class="col ">Trạng thái tác động</div>
                <div class="col ">Thời gian</div>
            </li>
            @foreach ($history as $row)
                <li class="table-row">
                    <div class="col">{{ $row->cabinet_id }}</div>
                    <div class="col" data-label="Customer Name">{{ $row->staff_name }}</div>
                    <?php
                    if ($row->status2 == '0') {?>
                        <div class="col"><p style ='color: red;font-weight:600;'>Đóng tủ</p></div>
                    <?php } else {?>
                        <div class="col"><p style ='color: rgb(0, 255, 64);font-weight:600;'>Mở tủ</p></div>
                    <?php }
                    ?>
                    <div class="col" data-label="Customer Name">{{ $row->created_at }}</div>
                </li>
            @endforeach
        </ul>
        <div class="pagination">{{$history->links()}}</div>
    </div>
@endsection
