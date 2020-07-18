<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
</head>
<body>
    <div>
    <h2>Tạo khách hàng mới</h2>
    <form action="store" method="post">
        @csrf
        <div>
            <label for="">Số thứ tự</label>
            <input type="text" name="number">
        </div>
        <div>
            <label for="">Tên</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Số điện thoại</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" id="">
        </div>
        <div>
            <input type="submit" value="Thêm khách hàng">
        </div>
    </form>
</div>
</body>
</html>