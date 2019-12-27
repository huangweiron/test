<?php /*a:1:{s:62:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\person.html";i:1574429540;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/index/css/person.css">
</head>

<body>
    <form action="perupda" method="POST">
        <div class="tab">
            <input type="text" value="<?php echo htmlentities($teacher['Id']); ?>" name="id" style="display: none;">
            <p>教师号：<input type="text" value="<?php echo htmlentities($teacher['user_id']); ?>" readonly="readonly"></p>
            <p>姓&nbsp;&nbsp;&nbsp;名：<input name="name" type="text" value="<?php echo htmlentities($teacher['name']); ?>"></p>
            <p>性&nbsp;&nbsp;&nbsp;别：<input name="sex" type="text" value="<?php echo htmlentities($teacher['sex']); ?>"></p>
            <input type="submit" value="确定">
        </div>
    </form>
</body>

</html>