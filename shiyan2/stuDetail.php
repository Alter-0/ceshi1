<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加记录</title>
</head>
<style>
    #content {
        width: 600px;
        height: 600px;
        border: solid 1px #6699FF;
        padding: 30px;
        margin: 50px auto;
    }
    #left {
        float: left;
        width: 350px;
        height: 300px;
    }
    #right {
        float: left;
        width: 250px;
        height: 300px;
    }
    #bottom {
        clear: both;
        width: 600px;
        height: 200px;
    }
    label {
        width: 50px;
        display: block;
        float: left;
    }
    #pic {
        width: 120px;
        height: 160px;
        background: #cccccc;
        padding: 10px;
    }
    #pic img {
        width: 120px;
        height: 160px;
    }
    span{
        color: #FF9966;
    }
</style>
<body>
<div>
    <?php
    include "conn.php";
    $stu_no=$_GET["stu_no"];
    $result = mysqli_query($conn, "SET NAMES UTF8") or die("数据查询失败");
    $sql = "select * from student,major where stu_no=$stu_no and student.major_id=major.major_id";
    $result = mysqli_query($conn, $sql) or die("数据查询失败");
    $row = mysqli_fetch_assoc($result);
    ?>
    <div id="content">
        <div id="left">
            <p><label>学号</label><span><?php echo $row["stu_no"] ?></span></p>
            <p><label>姓名</label><span><?php echo $row["stu_name"] ?></span></p>
            <p><label>专业</label><span><?php echo $row["major_name"] ?></span></p>
            <p><label>性别</label><span><?php echo $row["gender"] ?></span></p>
            <p><label>生日</label><span><?php echo $row["birthdate"] ?></span></P>
            <p><label>电话</label><span><?php echo $row["telephone"] ?></span></p>
            <p><label>邮箱</label><span><?php echo $row["email"] ?></span></p>
        </div>
        <div id="right">
            <div id="right">
                <div id="pic">
                    <img id="img"
                         src="<?php if (empty($row["photo"])) echo "暂无照片"; else echo $row["photo"]; ?>"/>
                </div>
            </div>
        </div>
        <div id="bottom">
            <?php
            if (empty($row["resume"]))
                echo "尚未填写个人简介";
            else
                echo $row["resume"]
            ?>
        </div>
    </div>
</div>
</body>
</html>