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
$sushe=array("马瑞龙","高辰浩","何福雨","易渤","林鹏飞","陈哲远");
sort($sushe);
print_r($sushe);
echo "<br>";
rsort($sushe);
print_r($sushe);
?>
</body>
</html>