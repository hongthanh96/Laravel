<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chiết khẩu</title>
</head>
<body>
    <h2>Tính chiết khấu sản phẩm</h2>
    <form action="/product" method="post">
    @csrf
        <div>
            <label for="">Product Discription: </label>
            <input type="text" name="discription" placeholder="Nhập mô tả sản phẩm">
        </div>
        <div>
            <label for="">List price</label>
            <input type="text" name="list_price" placeholder="Nhập giá niêm yết sản phẩm">
        </div>
        <div>
            <label for="">Discount Percent</label>
            <input type="text" name="discount_percent" placeholder="Nhập tỉ lệ chiết khấu ( phần trăm) ">
        </div>
        <div>
        <input type="submit" value="Calculate Discount">
        </div>
    </form>
</body>
</html>