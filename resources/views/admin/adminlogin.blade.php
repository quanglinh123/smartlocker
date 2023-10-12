<html>

<head>
    <title>Laravel 9 Custom Auth Login and Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="padding:50px;">
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <h3 class="card-header text-center">ĐĂNG NHẬP</h3>
                            @if (\Session::has('message'))
                                <div class="alert alert-info">
                                    {{ \Session::get('message') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('login.action') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Tên đăng nhập" id="admin_name" class="form-control"
                                            name="admin_name" autofocus>
                                        @if ($errors->has('admin_name'))
                                            <span class="text-danger">{{ $errors->first('admin_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Mật khẩu" id="password"
                                            class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">ĐĂNG NHẬP</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
