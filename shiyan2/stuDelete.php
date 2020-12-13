<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>
<body>
<?php
$stu_no=$_GET["stu_no"];
include "conn.php";
$sql="delete from student where stu_no='$stu_no'";
$result=mysqli_query($conn,$sql) or die("删除失败".sql);
header("location:stuBrowse.php");
?>
</body>
</html>