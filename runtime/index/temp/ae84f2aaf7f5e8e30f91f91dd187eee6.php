<?php /*a:1:{s:61:"D:\phpstudy_pro\WWW\test\app\index\view\container\person.html";i:1574420006;}*/ ?>
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
    <form action="perupda" method="post">
        <div class="tab">
            <input type="text" value="<?php echo htmlentities($student['Id']); ?>" name="id" style="display:none">
            <p>班级：<input type="text" value="<?php echo htmlentities($student['grade']); ?><?php echo htmlentities($student['class']); ?>" readonly="readonly"></p>
            <p>学号：<input type="text" value="<?php echo htmlentities($student['user_id']); ?>" readonly="readonly"></p>
            <p>姓名：<input name="name" type="text" value="<?php echo htmlentities($student['name']); ?>"></p>
            <p>性别：<input name="sex" type="text" value="<?php echo htmlentities($student['sex']); ?>"></p>
            <input type="submit" value="确定">
        </div>
    </form>
</body>

</html>