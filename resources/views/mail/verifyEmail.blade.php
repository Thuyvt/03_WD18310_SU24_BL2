<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào {{$userName}}</h1>
    <p> Cảm ơn bạn đã đăng ký thành viên Câu lạc bộ Bee IT</p>
    <p>Mời bấm xác thực tài khoản để tiếp tục sử dụng hệ thống</p>
    <button>
        <a href="{{route('verify', $token)}}">Xác thực tài khoản</a>
    </button>
</body>
</html>
