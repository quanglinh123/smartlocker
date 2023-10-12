<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

</head>

<body class="antialiased">
    <div class="container">
        <div class="header">
            <h3> Chào mừng đến với trang quản lý</h3>
            @auth
            <select onchange="location = this.value;">
                <option > <b>Xin chào : {{ Auth::User()->admin_name }}</b></option>
                <option value={{ route('logout')}} > Đăng xuất</option>
            </select>
            @endauth
        </div>
        <div class="wrapper">
            <div class="sidebar">
                <ul class="listadmin">
                    <li> <a href="{{ route('admin') }}"> Danh sách các tủ </a></li>
                    <li> <a href="{{ route('cluster') }}"> Quản lý cụm tủ </a></li>
                    <li> <a href="{{ route('floor') }}"> Quản lý tầng </a></li>
                    <li> <a href="{{ route('department') }}"> Danh sách phòng ban </a></li>
                    <li> <a href="{{ route('staff') }}"> Thông tin nhân viên </a></li>
                    <li> <a href="{{ route('history') }}"> Lịch sử mở đóng tủ </a></li>
                    <li> <a href="{{ route('account') }}"> Quản lý tài khoản </a></li>
                </ul>
            </div>
            @yield('main')
        </div>
        <div class="footer"></div>
    </div>
</body>

</html>
