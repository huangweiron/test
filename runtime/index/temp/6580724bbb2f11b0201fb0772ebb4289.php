<?php /*a:1:{s:69:"D:\field\phpstudy_pro\WWW\test\app\index\view\tcontainer\addtest.html";i:1576824934;}*/ ?>
<link rel="stylesheet" href="/static/index/css/tcontainer.css">
<button class="btn" onclick="hui()">
    <<</button> <form action="add?sktimeId=<?php echo htmlentities($sktimeId); ?>&classId=<?php echo htmlentities($classId); ?>" method="post" enctype="multipart/form-data">
        <div>
            <h3>课堂知识点</h3>
            <textarea name="konw" id="content" cols="130" rows="30"></textarea>
            <h3>课堂作业</h3>
            <textarea name="content" id="content" cols="130" rows="30"></textarea>
            <br><label>上传文件</label>
            <input type="file" name="file">
            <input type="submit" value="上传">
        </div>
        </form>
        <script>
            function hui() {
                history.go(-1);
            }
        </script>