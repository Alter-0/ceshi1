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

<div id="panel">
    <form name="login" method="post" action="check.php">
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

