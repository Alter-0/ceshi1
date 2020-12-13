<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<style type="text/css">

    #panel {
    height: 100px;
        width: 260px;
        margin: 200px auto;
        padding: 20px;
        background: #ccc;
    }
    a:link{
    text-decoration: none;
    }
    tr{
    height: 35px;
    }
</style>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];

    $user_pass = $_POST["user_pass"];
    $conn = mysqli_connect("localhost", "root", "", "shiyan") or die("数据库连接失败");
    mysqli_query($conn, "SET NAMES UTF8");
    $sql = "select * from user where user_name='$user_name'";
    $result = mysqli_query($conn, $sql) or die("查询失败");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($user_pass, $row['user_pass'])) {
            session_start();
            $_SESSION["user"] = $user_name;
            header("location:main.php");
        } else {
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
}
?>

<div id="panel">
    <form name="login" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="user_name" size="20"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="user_pass"size="20"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="登录"></td>
                <td align="right"><a href="reg.php">注册</a></td>
            </tr>

        </table>

    </form>

</div>

</body>
