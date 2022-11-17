<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gửi mail</title>
</head>
<body>
<h2>Gửi mail thành công.</h2>
<h2>Bạn có 1 lịch thay đổi,vui lòng đăng nhập vào để xem.</h2>
@forelse ($schedule as $item)
<h3>Giảng viên : {{$item->admin->name}}</h3>
<h3>Môn : {{$item->subject->name}}</h3>
<h3>Lớp: {{$item->room->name}}</h3>
@empty
    <h3>Dữ liệu trống.</h3>
@endforelse
<a href="{{route('admin.login')}}">Đăng nhập</a>
</body>
</html>
