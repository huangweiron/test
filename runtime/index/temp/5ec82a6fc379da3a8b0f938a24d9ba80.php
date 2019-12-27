<?php /*a:1:{s:66:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\curriculum.html";i:1576843491;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/index/css/tcontainer.css">
</head>

<body>
    <button class="btn" onclick="hui()">
        <<</button> <table cellspacing="0">

            <tr>
                <th>课程</th>
                <th>周次</th>
                <th>星期</th>
                <th>节次</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($kc) || $kc instanceof \think\Collection || $kc instanceof \think\Paginator): $i = 0; $__LIST__ = $kc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['name']); ?></td>
                <td><?php echo htmlentities($vo['zhouci']); ?></td>
                <td><?php echo htmlentities($vo['week']); ?></td>
                <td><?php echo htmlentities($vo['jieci']); ?></td>
                <td>
                    <a href="addtest?classId=<?php echo htmlentities($classId); ?>&&sktimeId=<?php echo htmlentities($vo['Id']); ?>">发布</a>
                    <a href="read?sktimeId=<?php echo htmlentities($vo['Id']); ?>">查看</a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="5" class="page">
                    <a href="curriculum?ye=-&&page=<?php echo htmlentities($page); ?>&&">上一页</a>
                    <a href="curriculum?ye=+&&page=<?php echo htmlentities($page); ?>&&nm=<?php echo htmlentities($nm); ?>">下一页</a>
                </td>
            </tr>
            </table>
            <script>
                function hui() {
                    history.go(-1);
                }
            </script>
</body>

</html>