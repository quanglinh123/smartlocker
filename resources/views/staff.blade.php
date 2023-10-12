@extends('welcome')
@section('main')
    <div class="main">
        <a class="add" href="{{ route('addstaff') }}">Thêm nhân viên mới</a>
        <div class="search">
            <div class="search1">
                <h3>Danh sách nhân viên</h3><br>
                <form class="tb_search" action="{{ route('search') }}" method="GET">
                    <div class="search_contnet">
                        <label>Tên nhân viên</label>
                        <input type="text" name="staff_name">
                    </div>
                    <div class="search_contnet">
                        <label>Phòng ban làm việc</label>
                        <select name="department_name">
                            <option value=""></option>
                            @foreach ($department as $row)
                                <option value="{{ $row->department_name }}">{{ $row->department_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_contnet">
                        <label>Trạng thái</label>
                        <select name="staff_status">
                            <option value=""></option>
                            <option value="1">Đã cấp tủ </option>
                            <option value="2">Chưa cấp tủ</option>
                        </select>
                    </div>
                    <input type="submit" value="Tìm kiếm" class="btn btn-secondary">
                </form>
            </div>
        </div>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col ">Tên Nhân Viên</div>
                <div class="col ">Phòng ban</div>
                <div class="col">Số điện thoại</div>
                <div class="col">Trạng thái</div>
                <div class="col ">Tủ đang sử dụng</div>
                <div class="col1 ">Thao tác</div>
            </li>
            @foreach ($staff as $row)
                <li class="table-row">
                    <div class="col">{{ $row->staff_name }}</div>
                    <div class="col">{{ $row->department_name }}</div>
                    <div class="col" data-label="Customer Name">{{ $row->staff_phone }}</div>
                    <?php if ($row->staff_status == '2') {?>
                    <div class="col">
                        <p style='color: red;font-weight:600;'>Chưa cấp ngăn tủ</p>
                    </div>
                    <div class="col" data-label="Amount"><?php if($row->cabinet_id != "0"){?>{{ $row->cabinet_id }}<?php }?>
                    </div>
                    <div class="col">
                        <button><a  href="{{ 'update/' . $row->staff_id }}">Gán tủ</a> </button>
                    </div>
                    <?php
                        } elseif ($row->staff_status == '1') {?>
                        <div class="col">
                            <p style ='color: rgb(0, 255, 64);font-weight:600;'>Đã cấp ngăn tủ</p>
                        </div>
                        <div class="col" data-label="Amount"><?php if($row->cabinet_id != "0"){?>{{ $row->cabinet_id }}<?php }?>
                        </div>
                        <div class="col">
                            <button><a  href="{{ 'clearcabin/' . $row->staff_id }}">Giải phóng tủ</a> </button>
                            <button><a  href="{{ 'updatestaff/' . $row->staff_id }}">Chỉnh sửa</a> </button>
                            <button><a  href="{{ 'clearcabin/' . $row->staff_id }}">Xóa</a> </button>
                        </div>
                        <?php }
                        ?>

    </li>
    @endforeach
    </ul>
    <div>
    @endsection
