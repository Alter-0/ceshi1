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
$names = array(201811050493 => '陈哲远', 201811050510 => '易渤佩', 201811050505 => '高辰浩', 201811050496 => '林鹏飞', 201811050489 => '马瑞龙', 201811050499 => '何福雨');
//print_r($names);
foreach ($names as $num => $name){
    echo "$num"."的姓名是".$name."<br>";
}

?>
</body>
</html>