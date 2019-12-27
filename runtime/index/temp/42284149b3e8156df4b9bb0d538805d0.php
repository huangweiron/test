<?php /*a:1:{s:63:"D:\phpstudy_pro\WWW\test\app\index\view\tcontainer\addtest.html";i:1576842848;}*/ ?>
<link rel="stylesheet" href="/static/index/css/tcontainer.css">
<button class="btn" onclick="hui()">
    <<</button> <form action="add?sktimeId=<?php echo htmlentities($sktimeId); ?>&classId=<?php echo htmlentities($classId); ?>" method="post" enctype="multipart/form-data">
        <div>
            <h3>课堂知识点</h3>
            <textarea name="know" id="know" cols="130" rows="20"><?php echo htmlentities($result['know']); ?></textarea>
            <h3>课堂作业</h3>
            <textarea name="content" id="content" cols="130" rows="10"><?php echo htmlentities($result['content']); ?></textarea>
            <br><label>上传文件</label>
            <a href="download?filename=<?php echo htmlentities($result['filename']); ?>"><?php echo htmlentities($result['filename']); ?></a>
            <br>
            <input type="file" name="file">
            <input type="submit" value="上传">
        </div>
        </form>
        <script>
            function hui() {
                history.go(-1);
            }
        </script>