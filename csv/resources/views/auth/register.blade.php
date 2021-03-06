<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng ký</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset("vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/sb-admin.css")}}" rel="stylesheet">
    <style>
        #logo {
            width: 50px;
            height: 50px;
        }
        h1 {
            color: #fffdff;
        }
    </style>
</head>

<body id="page-top" class="bg-secondary">

<div class="container">
    <h1 class="text-center">
        <img src="https://lh3.googleusercontent.com/onrgrI6MJCJysWzGq4ParMg1lQGbDDu0ZI4qsqCGMycV3gwSyDXVaY_HWPhXxSFeQWU=w300"
             id="logo" alt="">
        Hệ thống quản lý cựu sinh viên
    </h1>
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Tạo tài khoản</div>
        <div class="card-body">
            <form method="POST" action="{{route('register')}}">
                {{csrf_field()}}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Đăng ký') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="/login">Quay về đăng nhập</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("vendor/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("vendor/datatables/dataTables.bootstrap4.js")}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset("js/sb-admin.min.js")}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset("js/demo/datatables-demo.js")}}"></script>
<script src="{{asset("js/demo/chart-area-demo.js")}}"></script>

</body>

</html>