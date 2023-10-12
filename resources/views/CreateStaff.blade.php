<html>

<head>
    <meta charset="utf-8">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addstaff.css') }}">
</head>

<body>
    <div class="container">
        <div class="inputs">
            <form class="inputz" method="post" action="{{ route('addstaff.action') }}">
                @csrf
                <label>Tên nhân viên</label>
                <input type="text" name="staff_name" />
                <label>Số điện thoại</label>
                <input type="text" name="staff_phone" />
                <label>Phòng ban làm việc</label>
                <select name="department_name">
                    @foreach ($department as $row)
                        <option value="{{ $row->department_name }}">{{ $row->department_name }} </option>
                    @endforeach
                </select>
                <button type="submit">Thêm mới</button>
            </form>
        </div>
    </div>
</body>

</html>
