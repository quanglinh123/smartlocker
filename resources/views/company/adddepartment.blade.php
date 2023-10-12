<html>
    <head>
    <meta charset="utf-8">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addstaff.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="inputs">
                <form method="post" action="{{ route('adddepartment.action') }}">
                    @csrf
                    <label>Tên phòng ban</label>
                    <input type="text" name="department_name" />
                    <button type="submit">Thêm mới</button>
                </form>
            </div>
        </div>
    </body>
</html>