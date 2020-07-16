<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Form đăng nhập</h1>
    <form action="login" method="post">
    @csrf
    <div>
        <label for="">Tên đăng nhập: </label>
        <input type="text" name="userName" placeholder="Nhập tên đăng nhập">
    </div>
    <div>
        <label for="">Mật khẩu</label>
        <input type="password" name="password" placeholder="Nhập mật khẩu">
    </div>
    <div><input type="submit" value="Login"></div>
    </form>
</body>
</html>