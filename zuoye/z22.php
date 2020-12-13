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
$sql = "select * from gch ";
$result = mysqli_query($conn, $sql) or die("数据查询失败");

while ($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}

?>
</body>
</html>