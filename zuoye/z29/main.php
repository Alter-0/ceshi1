<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["user"])){
    echo "<script>alert('请先登录！');location.href='login.php';</script>";
    exit;
}
$user=$_SESSION["user"];
?>
<p> 欢迎您! <?php echo $user?></p>
<p><a href="exit.php">注销</a></p>
</body>
</html>
