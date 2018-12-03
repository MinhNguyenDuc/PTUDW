@extends('layout.client')
@section('content')

    <style>
        .avatar-img {
            width: 150px;
            height: auto;
        }
    </style>


    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Danh sách sinh viên
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Mã số sinh viên</th>
                            {{--<th scope="col">Ảnh đại diện</th>--}}
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Số điệnt thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Niên khóa</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_student as $item)
                            <tr>
                                <th scope="row">{{$item->studentID}}</th>
                                {{--<td>--}}
                                    {{--<img class="avatar-img" src="{{$item->avatar}}"--}}
                                         {{--alt=""/>--}}
                                {{--</td>--}}
                                <td>{{$item->name}}</td>
                                <td>
                                    @switch($item->gender)
                                        @case(1)
                                            Nam
                                            @break
                                        @case(0)
                                            Nữ
                                            @break
                                        @case(-1)
                                            Không rõ
                                            @break
                                    @endswitch
                                </td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>K{{$item->academic_yearID}}</td>
                                <td>
                                    <button class="btn btn-info student-detail"
                                            onclick="loadDetailUrl({{$item->studentID}})">Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>

    <script>
        function loadDetailUrl(id) {
            window.location.href = '/student/' + id;
        }
    </script>
@endsection