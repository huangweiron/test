<?php /*a:1:{s:62:"D:\field\phpstudy_pro\WWW\test\app\index\view\index\index.html";i:1574348378;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/index/css/index.css">
</head>
<body>
    
    <form method="POST" action="<?php echo url('index/login'); ?>">
        <div id="container">
            <h1>登录</h1>
            <p>
                <label for="user_id">学号：</label>
                <input type="text" name="user_id" id="user_id" placeholder="学号/教师账号" autocomplete="off">
            </p>
            <p>
                <label for="password">密码：</label>
                <input type="password" name="password" id="password">
            </p>
            <p><input type="radio" name="school" value="student" id="student" checked>
                <label for="student">学生</label> 
                <input type="radio" name="school" value="teacher" id="teacher">
                <label for="teacher">教师</label> 
            </p>
            <p>
                <input type="submit" value="登录" id="sub" name="sub">
                <input type="reset" value="重置">
            </p>
        </div>
        
    </form>
    <script>
        function submit(){formname.submit()};
        document.getElementById("user_id").focus();
    </script>
</body>
</html>