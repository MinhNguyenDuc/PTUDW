<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset("vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/sb-admin.css")}}" rel="stylesheet">

</head>

<body id="page-top" class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form method="POST" action="{{url('/register')}}">
                {{csrf_field()}}
                {{--<div class="form-group">--}}
                    {{--<div class="form-row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-label-group">--}}
                                {{--<input type="text" id="firstName" class="form-control" placeholder="First name"--}}
                                       {{--required="required" autofocus="autofocus">--}}
                                {{--<label for="firstName">First name</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-label-group">--}}
                                {{--<input type="text" id="lastName" class="form-control" placeholder="Last name"--}}
                                       {{--required="required">--}}
                                {{--<label for="lastName">Last name</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                               required="required">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                       required="required">
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="confirmPassword" class="form-control"
                                       placeholder="Confirm password" required="required">
                                <label for="confirmPassword">Confirm password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary btn-block" href="login.html">Register</a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="/login">Login Page</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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