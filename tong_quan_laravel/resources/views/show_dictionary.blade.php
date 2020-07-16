<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>search</h2>
    <?php $flag = false;?>
   <?php foreach ($dictionary as $word => $description): ?>
       <?php if ($word == $search): ?>
        <?php echo "Từ : $search có nghĩa là $description" ?>
        <?php $flag = true ?>
        <?php endif ?>
    <?php endforeach ?>
    <?php if($flag == false): ?>
        <?= "Không tìm thấy từ bạn tìm!" ?>
    <?php endif ?>
</body>
</html>