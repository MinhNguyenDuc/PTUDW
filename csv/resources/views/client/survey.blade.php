@extends('layout.client')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Xin chào !</h1>
            <p class="lead">Đây là một bài khảo sát đơn giản giúp cho phòng đào tạo trường Đại Học Công Nghệ nắm được thông
            tin về nghề nghiệp, chất lượng cuộc sống của các cựu sinh viên</p>
            <hr class="my-4">
            <p>Bài khảo sát này là không bắt buộc. Tuy nhiên, chúng tôi hy vọng bạn sẽ thực hiện để góp phần làm tăng chất lượng giáo dục
            của nhà trường.</p>
            <p>Chúng tôi cam kết không lưu lại bất kì thông tin cá nhân nào của bạn. Bài khảo sát này thực hiện hoàn toàn nặc danh</p>
            <a class="btn btn-info btn-lg" href="#" role="button" id="do-btn">Tôi muốn thực hiện bài khảo sát</a>
            <a class="btn btn-warning btn-lg" href="#" role="button" id="reject-btn">Tôi không muốn làm bài khảo sát này</a>
            <a class="btn btn-success btn-lg" href="#" role="button" id="done-btn">Tôi đã hoàn thành bài khảo sát</a>
        </div>
    </div>
    <script>
        $("#do-btn").click(function () {
            swal({
                type: 'info',
                title: 'Cảm ơn bạn',
                text: 'Khi hoàn thành bài khảo sát, vui lòng quay lại đây và xác nhận bạn đã thực hiện',
                confirmButtonText: 'Chuyển hướng tới bài khảo sát'
            }).then((result)=>{
                window.location.href = 'https://docs.google.com/forms/d/e/1FAIpQLSeEFSNArnwawih0L2bkl6mGbcTST2ZBFYRhSUclXrDJmExjQg/viewform';
            });
        });

        $("#reject-btn").click(function () {
            swal({
                type: 'info',
                title: 'Cảm ơn bạn',
                text: 'Bạn vẫn luôn có thể quay lại và thực hiện bài khảo sát này',
                confirmButtonText: 'OK'
            }).then((result)=>{
                window.location.href = '/home';
            });

        });

        $("#done-btn").click(function () {
            $.ajax({
                type: "put",
                url: 'http://localhost:8000/survey/{{$id}}/done',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "survey": 1
                }
            }).done(function (response) {
                if(response == '200'){
                    swal({
                        type: 'success',
                        title: 'Thank you !',
                        text: 'Chúng tôi rất cảm ơn sự đóng góp của bạn',
                        confirmButtonText: 'OK'
                    }).then((result)=>{
                        window.location.href = '/survey';
                    });
                }
            })
        });
    </script>
@endsection
