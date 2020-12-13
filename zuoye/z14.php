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
ini_set('date.timezone','Asia/Shanghai');
$t=mktime(9,30,0,12,12,2000);
echo date("Y/m/d H:i:s",$t)
?>
</body>
</html>
