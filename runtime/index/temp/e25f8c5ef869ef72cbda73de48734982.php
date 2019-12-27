<?php /*a:1:{s:71:"D:\field\phpstudy_pro\WWW\test\app\index\view\tcontainer\readclass.html";i:1576824429;}*/ ?>
<link rel="stylesheet" href="/static/index/css/tcontainer.css">
<button class="btn" onclick="hui()">
    <<</button> <h3>以往发布作业</h3>
        <table class="readclass" cellspacing="0">

            <tr>
                <th>作业</th>
                <th>文件</th>
                <th>时间</th>
                <th>查看学生作业</th>
            </tr>
            <?php foreach($twords as $key => $tword): ?>
            <tr>
                <td><?php echo htmlentities($tword['content']); ?></td>
                <td><a href="download?filename=<?php echo htmlentities($tword['filename']); ?>"><?php echo htmlentities($tword['filename']); ?></a></td>
                <td><?php echo htmlentities($tword['time']); ?></td>
                <td><a class="read" href="read?tewId=<?php echo htmlentities($tword['Id']); ?>&classId=<?php echo htmlentities($tword['classId']); ?>">查看</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td class='page' colspan="5">
                    <a href="readclass?page=-&num=<?php echo htmlentities($page); ?>&&classId=<?php echo htmlentities($classId); ?>">上一页</a>
                    <a href="readclass?page=+&num=<?php echo htmlentities($page); ?>&&classId=<?php echo htmlentities($classId); ?>">下一页</a>
                </td>
            </tr>
        </table>
        <a class="fabu" href="addtest?classId=<?php echo htmlentities($classId); ?>">发布作业</a>
        <script>
            function hui() {
                history.go(-1);
            }
        </script>