<?php /*a:1:{s:59:"D:\phpstudy_pro\WWW\test\app\index\view\index\register.html";i:1573315184;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="<?php echo url('index/login'); ?>">
        <div>
            <h1>注册</h1>
            <p>
                <label for="studId">学号：</label>
                <input type="text" name="studId" id="studId">
            </p>
            <p>
                <label for="password">密码：</label>
                <input type="text" name="password" id="password">
            </p>
            <p><input type="submit" value="登录" id="sub" name="sub"></p>
        </div>
        <p><a href="<?php echo url('index/index'); ?>">登录</a><a href="<?php echo url('index/register'); ?>">注册</a></p>
    </form>
</body>
</html>