<?php /*a:1:{s:60:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\read.html";i:1576844556;}*/ ?>
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
                <th>编号</th>
                <th>学生</th>
                <th>作业</th>
                <th>文件</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            <?php foreach($words as $key => $word): ?>
            <tr>
                <td>
                    <?php echo htmlentities($key+1); ?>
                </td>
                <td><?php echo htmlentities($word['name']); ?></td>
                <td><?php echo htmlentities($word['content']); ?></td>
                <td><a href="download?filename=<?php echo htmlentities($word['filename']); ?>"><?php echo htmlentities($word['filename']); ?></a></td>
                <td><?php echo htmlentities($word['time']); ?></td>
                <td><a href="chakan?id=<?php echo htmlentities($word['Id']); ?>" class="read">批改</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6" class="page">
                    <a href="read?page=-&num=<?php echo htmlentities($page); ?>&tewId=<?php echo htmlentities($sktimeId); ?>">上一页</a>
                    <a href="read?page=+&num=<?php echo htmlentities($page); ?>&tewId=<?php echo htmlentities($sktimeId); ?>">下一页</a>
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