<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            margin-top: 50px;
            width: 50%;
            border: 1px solid #66CCFF;
        }
        th {
            text-align: center;
            background-color: #6cb5db;
        }

        tr {
            height: 35px;
        }

    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "gch") or die("数据库连接失败");
mysqli_query($conn, "SET NAMES UTF8");

function filterInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no=filterInput($_POST["no"]);
    $phone=filterInput($_POST["phone"]);
    $sql = "UPDATE `gch` SET `no` = '$no',`phone`=$phone WHERE `gch`.`name` = '高辰浩';";
    $result = mysqli_query($conn, $sql) or die("修改失败，请检查SQL语法");

}
?>
<div id="panel">
    <form name="reg" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
<!--            <tr>-->
<!--                <td>姓名</td>-->
<!--                <td><input type="text" name="name"></td>-->
<!--            </tr>-->
            <tr>
                <td>学号</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td>手机号</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="修改高辰浩的数据"></td>
            </tr>
        </table>

    </form>

</div>
</body>
</html>
