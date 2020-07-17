<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<button><a href="./create">Thêm khách hàng</button>
<table border="1">
  <thead>
  <tr>
      <th>STT</th>
      <th>Họ và tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Thao tác</th>
  </tr>
  </thead>
  <tbody>
  <tr>
      <td>1</td>
      <td>Nguyễn Văn A</td>
      <td>01234567890</td>
      <td>email.test@mail.com</td>
      <td>
<a href="1/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
      </td>
  </tr>
  <tr>
      <td>2</td>
      <td>Nguyễn Văn B</td>
      <td>01234567890</td>
      <td>email.test@mail.com</td>
      <td>
          <a href="2/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
      </td>
  </tr>
  <tr>
      <td>3</td>
      <td>Nguyễn Văn C</td>
      <td>01234567890</td>
      <td>email.test@mail.com</td>
      <td>
          <a href="3/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
      </td>
  </tr>
  <tr>
      <td>4</td>
      <td>Nguyễn Văn D</td>
      <td>01234567890</td>
      <td>email.test@mail.com</td>
      <td>
          <a href="4/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
      </td>
  </tr>
  <tr>
      <td>5</td>
      <td>Nguyễn Văn E</td>
      <td>01234567890</td>
      <td>email.test@mail.com</td>
      <td>
          <a href="5/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
      </td>
  </tr>
  <tr>
    <td>{{$number ?? '' }}</td>
    <td>{{$name ?? ''}}</td>
    <td>{{$phone ?? ''}}</td>
    <td>{{$email ?? ''}}</td>
    <td>
        <a href="{{$number ?? '' }}/show">Xem</a> | <a href="#">Sửa</a> | <a href="#">Xóa</a>
    </td>
</tr>
  </tbody>
</table>
</body>
</html>
