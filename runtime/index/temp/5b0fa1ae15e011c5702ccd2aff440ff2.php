<?php /*a:1:{s:65:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\knowledge.html";i:1576765979;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h4>课程知识点</h4>
    <textarea name="context" id="" cols="150" rows="30"></textarea>
    <br>
    <a href="#">添加课堂知识点</a>
    <a href="readclass?classId=<?php echo htmlentities($classId); ?>&&sktimeId=<?php echo htmlentities($sktimeId); ?>">发布作业</a>
</body>

</html>