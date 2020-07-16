<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <style>
         #search{
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc; 
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit{
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>TỪ ĐIỂN ANH_VIỆT</h1>
    <form action="/dictionary" method="post">
    @csrf
        <input type="text" name="search" id = "search">
        <input type="submit" value="Tìm kiếm" id = "submit">
    </form>
</body>
</html>