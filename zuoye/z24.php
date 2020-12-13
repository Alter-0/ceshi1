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
    $name=filterInput($_POST["name"]);
    $no=filterInput($_POST["no"]);
    $phone=filterInput($_POST["phone"]);
    $sql = "insert into gch(name,no,phone) values('$name','$no','$phone')";
    $result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");


    $sql="select * from gch ";
    $result = mysqli_query($conn, $sql) or die("数据查询失败");
    if (mysqli_num_rows($result) > 0) {
        echo "<table align='center'>";
        echo "<tr><th>姓名</th><th>学号</th><th>电话号</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<td >$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "</tr>";
        }
    }
}
?>
<div id="panel">
    <form name="reg" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>学号</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td>手机号</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="添加"></td>
            </tr>
        </table>

    </form>

</div>
</body>
</html>
