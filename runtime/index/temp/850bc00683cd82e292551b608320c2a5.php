<?php /*a:1:{s:60:"D:\phpstudy_pro\WWW\test\app\index\view\container\query.html";i:1576846149;}*/ ?>
<link rel="stylesheet" href="/static/index/css/work.css">
<button class="btn" onclick="hui()">
    <<</button> <div class="query">
        <h2>课堂知识点</h2>
        <textarea cols="100" rows="10" readonly="readonly">
            <?php echo htmlentities($word['know']); ?>
        </textarea>
        <h2>本次作业内容：</h2>
        <textarea cols="100" rows="10" readonly="readonly">
        <?php echo htmlentities($word['content']); ?>
    </textarea>
        <h2>文件</h2>
        <a href="download?filename=<?php echo htmlentities($word['filename']); ?>"><?php echo htmlentities($word['filename']); ?></a><br><br>
        <a href="addtest?user=<?php echo htmlentities($user); ?>&teaword=<?php echo htmlentities($word['Id']); ?>" target="mymain"
            class="complete">查看/完成作业</a><span>(<?php echo htmlentities($complete); ?>)</span>
        </div>
        <script>
            function hui() {
                history.go(-1);
            }
        </script>