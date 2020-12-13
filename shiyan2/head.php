<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>head</title>
    <style>
        h1 {
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>学生信息管理</h1>
<?php
session_start();

echo "<h4>当前用户:".$_SESSION["user"]."</h4>";
?>


</body>
</html>