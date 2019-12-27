<?php /*a:1:{s:59:"D:\phpstudy_pro\WWW\test\app\index\view\container\work.html";i:1576585128;}*/ ?>
<link rel="stylesheet" href="/static/index/css/work.css">

<div class="container">
    <table cellspacing="0">
        <tr>
            <th>编号</th>
            <th>教师</th>
            <th>文件</th>
            <th>时间</th>
            <th>操作</th>
        </tr>

        <?php foreach($words as $key => $word): ?>
        <tr>
            <td><?php echo htmlentities($key+1); ?></td>
            <td><?php echo htmlentities($word['name']); ?></td>
            <td><a href="download?filename=<?php echo htmlentities($word['filename']); ?>"><?php echo htmlentities($word['filename']); ?></a></td>
            <td><?php echo htmlentities($word['time']); ?></td>
            <td><a class="read" href="query?id=<?php echo htmlentities($word['Id']); ?>&user=<?php echo htmlentities($user); ?>">查看</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan='5' class="page">
                <a href="?classId=<?php echo htmlentities($id); ?>&page=-&num=<?php echo htmlentities($page); ?>&user=<?php echo htmlentities($user); ?>">上一页</a>
                <a href="?classId=<?php echo htmlentities($id); ?>&one=1&user=<?php echo htmlentities($user); ?>">1</a>
                <a href="?classId=<?php echo htmlentities($id); ?>&page=+&num=<?php echo htmlentities($page); ?>&user=<?php echo htmlentities($user); ?>">下一页</a>
            </td>
        </tr>
    </table>
</div>