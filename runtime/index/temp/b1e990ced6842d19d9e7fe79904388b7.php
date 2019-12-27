<?php /*a:1:{s:62:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\chakan.html";i:1576845437;}*/ ?>
<link rel="stylesheet" href="/static/index/css/work.css">
<button class="btn" onclick="hui()">
    <<</button> <div class="query">
        <h2>本次作业内容：</h2>
        <textarea cols="100" rows="10">
            <?php echo htmlentities($word['content']); ?>
        </textarea>
        <h2>文件</h2>
        <a href="download?filename=<?php echo htmlentities($word['filename']); ?>"><?php echo htmlentities($word['filename']); ?></a>
        <form action="topion" method="GET">
            <h3>教师评价/意见</h3>
            <input type="text" name="Id" value="<?php echo htmlentities($word['Id']); ?>" style='display: none;'>
            <textarea name="topion" id="" cols="30" rows="10"><?php echo htmlentities($word['topion']); ?></textarea>
            <input type="submit" value="确定">
        </form>

        <script>
            function hui() {
                history.go(-1);
            }
        </script>