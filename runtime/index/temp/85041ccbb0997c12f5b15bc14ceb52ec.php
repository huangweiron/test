<?php /*a:1:{s:61:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\index.html";i:1576761448;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>教师</title>
    <link rel="stylesheet" href="/static/index/css/container.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <h3>欢迎<?php echo htmlentities($id['name']); ?>老师</h3><a class="move" href="../index/index.html">退出登录</a>
        </div>
        <div class="left">
            <ul>
                <li><a href="default" target="mymain">网站引导</a></li>
                <li><a href='person?user=<?php echo htmlentities($id['Id']); ?>' target="mymain">个人资料</a></li>
                <li><a href="release" target="mymain">班级课程</a></li>
            </ul>
        </div>
        <div class="main">
            <iframe name="mymain" width="100%" height="100%" src="<?php echo url('container/default'); ?>" frameborder="0"></iframe>
        </div>
    </div>
</body>

</html>