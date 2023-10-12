@extends('welcome')
@section('main')
    <div class="main">
        <div class="search">
            <div class="search1">
                <h3>Danh sách các tủ </h3><br>
                <form class="searchcabin" action="{{ route('searchcabin') }}" method="GET">
                    <label>Cụm tủ </label>
                    <select name="cluster_id">
                        <option value=""></option>
                        @foreach ($cluster as $row)
                            <option value="{{ $row->cluster_id }}">{{ $row->cluster_name }} </option>
                        @endforeach
                    </select>
                    <input type="submit" value="Tìm kiếm" class="btn btn-secondary">
                </form>
            </div>
        </div>
        <h2>Danh sách các tủ </h2>
        <div class="cabinlayout">
            <div class="cabinet">
                Thiết bị
            </div>
            @foreach ($cabinet as $row)
                <?php if ($row->status1 == '2') { ?>
                <div class="cabinet1">
                    <p> Ô tủ số : {{ $row->cabinet_id }}</p>          
                    <?php if($row->status2 == "0"){ echo "<p style ='color: rgb(17, 0, 255);font-weight:600;'>Đang đóng</p>"; ?>
                    <a href="{{ 'open/' . $row->cabinet_id }}"> Mở tủ </a>
                    <?php } else{ echo "<p style ='color: rgb(0, 255, 64);font-weight:600;'>Đang mở</p>"; ?>
                    <a href="{{ 'close/' . $row->cabinet_id }}"> Đóng tủ </a>
                    <?php } ?>
                </div>
                <?php } else{ ?>
                    <div class="cabinet2">
                    <p> Ô tủ số : {{ $row->cabinet_id }}</p>          
                    <?php if($row->status2 == "0"){ echo "<p style ='color: rgb(68, 0, 255);font-weight:600;'>Đang đóng</p>"; ?>
                    <a href="{{ 'open/' . $row->cabinet_id }}"> Mở tủ </a>
                    <?php } else{ echo "<p style ='color: rgb(0, 255, 64);font-weight:600;'>Đang mở</p>"; ?>
                    <a href="{{ 'close/' . $row->cabinet_id }}"> Đóng tủ </a>
                    <?php } ?>
                </div>

                <?php }?>
            @endforeach
        </div>
    </div>
@endsection
