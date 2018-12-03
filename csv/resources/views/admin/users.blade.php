@extends('layout.admin')
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
                Danh sách Tài khoản
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            {{--<th scope="col">Ảnh đại diện</th>--}}
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_user as $item)
                            <tr>
                                <th scope="row" class="item-id">{{$item->id}}</th>
                                <td class="item-name">{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td class="item-permission">{{$item->permission}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <button class="btn btn-info btn-authorize"
                                            ><i class="fas fa-code-branch"></i> Phân quyền
                                    </button>
                                    <button class="btn btn-danger btn-delete">
                                        <i class="fas fa-trash"></i> Xóa
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


        $('.btn-delete').click(function () {
            //console.log(this.closest('tr'));
            deleteUser(this);
        });
        
        $('.btn-authorize').click(function () {
           authorize(this);
        });

        function deleteUser(button) {
            var thisButton = $(button);
            var id = thisButton.closest("tr").children(".item-id").text();
            var name = thisButton.closest("tr").children(".item-name").text();
            swal({
                title: 'Bạn có chắc muốn xóa tài khoản '+name+' ?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "delete",
                        url: 'http://localhost:8000/user/'+id+'/delete',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function (response) {
                        if(response == '200'){
                            swal(
                                'Xóa thành công!',
                                name +' đã được xóa',
                                'success'
                            )
                            thisButton.closest('tr').remove();
                        } else if (response == '403'){
                            swal({
                                title: 'Bạn không có quyền xóa',
                                type: 'danger'
                            })
                        }
                    });


                }
            })
        }
        
        
        function authorize(button) {
            var thisButton = $(button);
            swal({
                text: 'Vui lòng chọn quyền cho tài khoản',
                input: 'select',
                inputOptions: {
                    'user': 'Người dùng',
                    'admin': 'Quản trị viên',
                },
                inputPlaceholder: 'Select',
                showCancelButton: true,
                inputValidator: (value) => {
                    var id = thisButton.closest("tr").children(".item-id").text();
                    var name = thisButton.closest("tr").children(".item-name").text();
                    $.ajax({
                        type: "put",
                        url: 'http://localhost:8000/user/'+id+'/authorize',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "permission": value
                        }
                    }).done(function (response) {
                        if(response == '200'){
                            swal(
                                'Phân quyền thành công',
                                name +' đã trở thành '+value.toUpperCase(),
                                'success'
                            )
                            thisButton.closest('tr').children('.item-permission').text(value);
                        } else if (response == '403'){
                            swal({
                                title: 'Bạn không có quyền xóa',
                                type: 'danger'
                            })
                        }
                    });
                }
            })
        }
    </script>
@endsection