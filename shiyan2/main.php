<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理系统</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            border: 0;
            overflow: hidden;
            height: 100%;
            max-height: 100%;
        }
        #top{
            position: absolute;
            top: 0;
            left: 0;
            height: 130px;
            width: 100%;
            overflow: hidden;
            vertical-align: middle;
        }

        #left
        {
            position: fixed;
            top: 130px;
            left: 0;
            height: 100%;
            width: 150px;
            overflow: hidden;
            vertical-align: top;
        }

        #right
        {
            position: absolute;
            left: 150px;
            top: 130px;
            height: 100%;
            width: 90%;
            right: 0;
            bottom: 0;
            overflow: hidden;

        }

    </style>
</head>
<!--<frameset rows="120,*">-->
<!--    <frame src="head.php" name="topFrame"scrolling="No" />-->
<!--    <frameset cols="177,*" framespacing="0">-->
<!--        <frame src="menu.php" name='left'  />-->
<!--        <frame src="stuBrowse.php" name='right' />-->
<!--    </frameset>-->
<!--</frameset>-->
<body>
<?php
include "islogin.php";
?>
<div>
    <iframe id="top" src="head.php"></iframe>
</div>

<div>
    <iframe id="left" src="menu.php" name="left"></iframe>
    <iframe id="right" src="stuBrowse.php" name="right"></iframe>
</div>
</body>
</html>