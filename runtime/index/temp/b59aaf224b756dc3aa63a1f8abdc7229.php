<?php /*a:1:{s:63:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\release.html";i:1576761968;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/index/css/tcontainer.css">
    <title>Document</title>
</head>

<body>
    <h1>管理班级</h1>
    <table class="release" cellspacing="0">
        <tr>
            <th>编号</th>
            <th>班级</th>
            <th>课程</th>
        </tr>
        <?php foreach($bnames as $key => $bname): ?>
        <tr>
            <td>
                <?php echo htmlentities($key+1); ?>
            </td>
            <td>
                <?php echo htmlentities($bname['grade']); ?><?php echo htmlentities($bname['class']); ?>
            </td>
            <td>
                <!-- <a href="readclass?classId=<?php echo htmlentities($bname['Id']); ?>">查看</a> -->
                <a href="curriculum?classId=<?php echo htmlentities($bname['Id']); ?>">查看</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>