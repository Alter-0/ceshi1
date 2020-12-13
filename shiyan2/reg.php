<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<style type="text/css">

    #panel {
        height: 100px;
        width: 350px;
        margin: 200px auto;
        padding: 20px;
        background: #ccc;
    }

    span {
        color: red;
    }


</style>

<body>
<?php
$nameErr = '';
$passErr = '';

function filterInput($data)
{
    $data = trim($data);//不必要的字符 (如：空格，tab，换行)。

    $data = stripslashes($data);//去除反斜杠 (\)

    $data = htmlspecialchars($data);//去除反斜杠 (\)

    return $data;

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = filterInput($_POST["user_name"]);

    $user_pass = filterInput($_POST["user_pass"]);

    if (empty($user_name)) {

        $nameErr = "用户名为空";

    }

    if (empty($user_pass)) {

        $passErr = "密码为空";

    }
    if ($nameErr == '' and $passErr == '') {
        include 'conn.php';

        $sql = "select * from user where user_name='$user_name' ";


        $result = mysqli_query($conn, $sql) or die("查询失败，请检查SQL语法");

        if (mysqli_num_rows($result) > 0) {

            echo "<script language='javascript' type='text/javascript'>";

            echo "alert('用户已经注册，请设置其他用户名');";

            echo "</script>";

        } else {
            $pass_hash = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql = "insert into user(user_name,user_pass) values('$user_name','$pass_hash')";
            $result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('用户注册成功');";
            echo "</script>";
        }
    }

}
?>
<div id="panel">
    <form name="reg" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="user_name"><span>*<?php echo $nameErr; ?></span></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="user_pass"><span>*<?php echo $passErr; ?></span></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="注册"></td>
            </tr>
        </table>

    </form>

</div>

</body>

