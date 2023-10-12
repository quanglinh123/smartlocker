<html>

<head>
    <meta charset="utf-8">
    <title>Thêm cụm tủ</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addstaff.css') }}">
</head>

<body>
    <div class="container">
        <div class="inputs">
            <form class ="inputz" method="post" action="{{ route('addcluster.action') }}">
                @csrf
                <label>Tên cụm</label>
                <input type="text" name="cluster_name" />
                <label>Tầng</label>
                <select name="floor_id">
                    @foreach ($floor as $row)
                        <option value="{{ $row->floor_id }}">{{ $row->floor_name }} </option>
                    @endforeach
                </select>
                <button type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
</body>

</html>
