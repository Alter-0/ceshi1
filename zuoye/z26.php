<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>
<body>
<?php
$name=$_GET["name"];
$conn = mysqli_connect("localhost", "root", "", "gch") or die("数据库连接失败");
mysqli_query($conn, "SET NAMES UTF8");
$sql="delete from gch where name='$name'";
$result=mysqli_query($conn,$sql) or die("删除失败".$sql);
header("location:z23.php");
?>
</body>
</html>
