<?php /*a:1:{s:62:"D:\phpstudy_pro\WWW\test\app\index\view\container\addtest.html";i:1576846284;}*/ ?>
<link rel="stylesheet" href="/static/index/css/work.css">
<button class="btn" onclick="hui()">
    <<</button> <form action="add?user=<?php echo htmlentities($user); ?>&teaword=<?php echo htmlentities($teaword); ?>" method="post" enctype="multipart/form-data">
        <div class="addtest">
            <h1>请选择任意方式提交作业</h1>
            <textarea name="content" id="content" cols="100" rows="10"><?php echo htmlentities($data['content']); ?></textarea>
            <br><label for="">已上传文件：</label>
            <a href="download?filename=<?php echo htmlentities($data['filename']); ?>"><?php echo htmlentities($data['filename']); ?></a>
            <br>
            <input type="button" value="请选择文件" onclick="file.click()" class="add">
            <input type="file" name="file" id="file" style="display:none">
            <input type="submit" value="上传">
            <h2>教师评价/评分</h2>
            <textarea name="topion" id="topion" cols="100" rows="10"><?php echo htmlentities($data['topion']); ?></textarea>
        </div>
        </form>
        <script>
            function hui() {
                history.go(-1);
            }
        </script>