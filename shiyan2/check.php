<?php

$user_name = $_POST["user_name"];

$user_pass = $_POST["user_pass"];
include 'conn.php';
$sql = "select * from user where user_name='$user_name'";
$result = mysqli_query($conn, $sql) or die("查询失败");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($user_pass, $row['user_pass']))
    {
        session_start();
        $_SESSION["user"] = $user_name;
        header("location:main.php");
    }
else {
        echo "<script language='JavaScript' type='text/JavaScript'>;";
        echo "alert('密码不正确');";
        echo "location.href='login.php';";
        echo "</script>";
    }
} else {
    //header("location:login.php");
    echo "<script language='JavaScript' type='text/JavaScript'>;";
    echo "alert('用户名错误');";
    echo "location.href='login.php';";
    echo "</script>";
}

?>








