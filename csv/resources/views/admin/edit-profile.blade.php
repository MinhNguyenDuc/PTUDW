@extends('layout.admin')

@section('content')
    <style>
        #avatar-image {
            width: 100%;
            max-width: 400px;
            height: auto;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <img src="{{$student->avatar}}" alt="" id="avatar-image">
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Thông tin cá nhân</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="/editProfile" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="student_id" class="col-4 col-form-label">Mã số sinh viên</label>
                                        <div class="col-8">
                                            @if($student->studentID == null)
                                                <input id="student_id" name="studentID" placeholder="Mã số sinh viên"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @else
                                                <input id="student_id" name="studentID" value="{{$student->studentID}}"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fullName" class="col-4 col-form-label">Họ và tên</label>
                                        <div class="col-8">
                                            @if($student->name == null)
                                                <input id="fullName" name="name" placeholder="Họ và tên đầy đủ"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @else
                                                <input id="fullName" name="name" value="{{$student->name}}"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birth" class="col-4 col-form-label">Ngày sinh</label>
                                        <div class="col-8">
                                            @if($student->birth == null)
                                                <input id="birth" name="birth" class="form-control here"
                                                       required="required" type="date">
                                            @else
                                                <input id="birth" name="birth" value="{{$student->birth}}" class="form-control here"
                                                       required="required" type="date">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-4 col-form-label">Ảnh đại diện</label>
                                        <div class="col-8">

                                            @if($student->avatar != null)
                                                <input id="avatar" name="avatar" value="{{$student->avatar}}"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @endif

                                            <div class="form-group">
                                                <label for="avatar">Tải ảnh lên</label>
                                                <input type="file" accept="image/jpeg" class="form-control-file"
                                                       id="avatar-select" name="avatar">
                                            </div>
                                            {{--@if($student->avatar == null)--}}
                                            {{--<input id="avatar" name="avatar" placeholder="Ảnh đại diện" class="form-control here"--}}
                                            {{--required="required" type="text">--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label for="avatar">Tải ảnh lên</label>--}}
                                            {{--<input type="file" class="form-control-file" id="avatar" name="avatar">--}}
                                            {{--</div>--}}
                                            {{--@else--}}
                                            {{--<input id="avatar" name="avatar" value="{{$student->avatar}}" class="form-control here"--}}
                                            {{--required="required" type="text">--}}
                                            {{--@endif--}}

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">Email</label>
                                        <div class="col-8">
                                            @if($student->email == null)
                                                <input id="email" name="email" placeholder="Email"
                                                       class="form-control here"
                                                       required="required" type="email">
                                            @else
                                                <input id="email" name="email" value="{{$student->email}}"
                                                       class="form-control here"
                                                       required="required" type="email">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-4 col-form-label">Số điện thoại</label>
                                        <div class="col-8">
                                            @if($student->phone == null)
                                                <input id="phone" name="phone" placeholder="Số điện thoại"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @else
                                                <input id="phone" name="phone" value="{{$student->phone}}"
                                                       class="form-control here"
                                                       required="required" type="text">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label">Niên khóa</label>
                                        <div class="col-2">
                                            <select name="academic_yearID" class="form-control">
                                                @foreach($academic_years as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $student->academic_yearID ? 'selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">Tỉnh thành</label>
                                        <div class="col-8">
                                            <select name="province" class="form-control">
                                                @foreach($list_province as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $student->province ? 'selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">Quận huyện</label>
                                        <div class="col-8">
                                            <select class="form-control" name="district" id="list-district">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-4 col-form-label">Giới tính</label>
                                        <div class="col-2">
                                            <select id="gender" name="gender" class="form-control">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                                <option value="-1">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Cập nhật
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let province = $('[name="province"]').val();
        getDistrict(province);

        $(document).ready(function () {
            $('[name="province"]').change(function () {
                var selectedProvince = $(this).children("option:selected").val();
                getDistrict(selectedProvince);
                s
            })

            $('[name="avatar"]').change(function () {
                $('#avatar-image').attr('src', $(this).val());
            });

            $("#avatar-select").change(function () {
                readURL(this);
            });
        });

        function getDistrict(provinceId) {
            $.ajax({
                type: "get",
                url: "http://localhost:8000/api/v1/get-district/" + provinceId,
            }).done(function (response) {
                var listDistrict = "";
                for (let i = 0; i < response.length; i++) {
                    var id = response[i].id;
                    var name = response[i].name;

                    var district = '{{$student->district}}';


                    if (id.toString() == district) {
                        listDistrict += '<option value=' + id + ' selected>' + name + '</option>';
                    }
                    else {
                        listDistrict += '<option value=' + id + '>' + name + '</option>';
                    }

                }
                document.getElementById('list-district').innerHTML = listDistrict;
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>
@endsection