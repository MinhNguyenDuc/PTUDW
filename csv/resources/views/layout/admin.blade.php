<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cựu sinh viên UET</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset("vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset("vendor/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset("css/sb-admin.css")}}" rel="stylesheet">

    <link href="{{asset("css/sweetalert2.min.css")}}" rel="stylesheet">
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("vendor/chart.js/Chart.min.js")}}"></script>

    <style>
        #logo {
            width: 30px;
            height: 30px;
            margin-right: 0.5em;
        }
    </style>
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-primary static-top">

    <img src="https://lh3.googleusercontent.com/onrgrI6MJCJysWzGq4ParMg1lQGbDDu0ZI4qsqCGMycV3gwSyDXVaY_HWPhXxSFeQWU=w300"
         id="logo" alt="">
    <a class="navbar-brand mr-1" href="/home">Cựu sinh viên UET ADMIN</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    {{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">--}}
        {{--<div class="input-group">--}}
            {{--<input type="text" class="form-control" placeholder="Search for..." aria-label="Search"--}}
                   {{--aria-describedby="basic-addon2">--}}
            {{--<div class="input-group-append">--}}
                {{--<button class="btn btn-success" type="button">--}}
                    {{--<i class="fas fa-search"></i>--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        {{--<li class="nav-item dropdown no-arrow mx-1">--}}
        {{--<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"--}}
        {{--aria-haspopup="true" aria-expanded="false">--}}
        {{--<i class="fas fa-bell fa-fw"></i>--}}
        {{--<span class="badge badge-danger">9+</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">--}}
        {{--<a class="dropdown-item" href="#">Action</a>--}}
        {{--<a class="dropdown-item" href="#">Another action</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown no-arrow mx-1">--}}
        {{--<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"--}}
        {{--aria-haspopup="true" aria-expanded="false">--}}
        {{--<i class="fas fa-envelope fa-fw"></i>--}}
        {{--<span class="badge badge-danger">7</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">--}}
        {{--<a class="dropdown-item" href="#">Action</a>--}}
        {{--<a class="dropdown-item" href="#">Another action</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown no-arrow">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"--}}
               {{--aria-haspopup="true" aria-expanded="false">--}}
                {{--<i class="fas fa-user-circle fa-fw"></i>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">--}}
                {{--<a class="dropdown-item" href="#">Settings</a>--}}
                {{--<a class="dropdown-item" href="#">Activity Log</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="#" id="logout-btn">Logout</a>--}}
            {{--</div>--}}
        {{--</li>--}}
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-home"></i>
                <span>Trang chủ</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/list">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>Danh sách sinh viên</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/users">
                <i class="fas fa-fw fa-users"></i>
                <span>Quản lý Người dùng</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/history">
                <i class="fas fa-fw fa-history"></i>
                <span>Nhật ký hoạt động</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="https://docs.google.com/forms/d/1myO2KqAP4MeBeIZ2DLKnY19X1cspbc2Vq5j6McZx4i4/edit">
                <i class="fas fa-fw fa-question"></i>
                <span>Thiết lập khảo sát</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/profile">
                <i class="fas fa-fw fa-user"></i>
                <span>Cài đặt tài khoản</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" id="logout" href="#">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper">

    @section('content')
    @show

    <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có chắc muốn đăng xuất ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
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
<script src="{{asset("vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset("js/sb-admin.min.js")}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset("js/demo/datatables-demo.js")}}"></script>
<script src="{{asset("js/demo/chart-area-demo.js")}}"></script>

<script>
    $("#logout").click(function () {
        swal({
            title: 'Bạn có muốn đăng xuất không ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Ở lại',
            confirmButtonText: 'Đăng xuất'
        }).then((result) => {
            if (result.value) {
                window.location.href = '/logout';
            }
        })
    });
</script>

</body>

</html>