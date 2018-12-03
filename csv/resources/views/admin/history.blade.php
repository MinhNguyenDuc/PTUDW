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
                Danh sách sinh viên
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            {{--<th scope="col">Ảnh đại diện</th>--}}
                            <th scope="col">Log Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Subject ID</th>
                            <th scope="col">Subject Type</th>
                            <th scope="col">Causer ID</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $item)
                            <tr>
                                <th scope="row" class="item-id">{{$item->id}}</th>
                                {{--<td>--}}
                                {{--<img class="avatar-img" src="{{$item->avatar}}"--}}
                                {{--alt=""/>--}}
                                {{--</td>--}}
                                <td class="item-name">{{$item->log_name}}</td>
                                <td>
                                    {{$item->description}}
                                </td>
                                <td>{{$item->subject_id}}</td>
                                <td>{{$item->subject_type}}</td>
                                <td>{{$item->causer_id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                {{--<td>--}}
                                    {{--<button class="btn btn-info student-detail"--}}
                                            {{--onclick="loadDetailUrl('{{$item->studentID}}')"><i class="fas fa-info-circle"></i> Chi Tiết--}}
                                    {{--</button>--}}
                                    {{--<button class="btn btn-danger btn-delete"><i class="fas fa-trash"></i> Xóa--}}
                                    {{--</button>--}}
                                {{--</td>--}}
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
            deleteStudent(this);
        });

        function deleteStudent(button) {
            var thisButton = $(button);
            var id = thisButton.closest("tr").children(".item-id").text();
            var name = thisButton.closest("tr").children(".item-name").text();
            swal({
                title: 'Bạn có chắc muốn xóa sinh viên '+name+' ?',
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
                        url: 'http://localhost:8000/student/'+id+'/delete',
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
    </script>
    <script>
        {{--@if(session()->has('notify'))--}}
        {{--const toast = swal.mixin({--}}
        {{--toast: true,--}}
        {{--position: 'top-end',--}}
        {{--showConfirmButton: false,--}}
        {{--timer: 3000--}}
        {{--});--}}

        {{--toast({--}}
        {{--type: 'success',--}}
        {{--title: '{{session()->get('notify')}}'--}}
        {{--})--}}
        {{--@endif--}}

    </script>
@endsection