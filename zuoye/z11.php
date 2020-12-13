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
$sushe = array(
    array("马瑞龙", "1111111111", "1111111111"),
    array("高辰浩", "1111111111", "1111111111"),
    array("何福雨", "1111111111", "1111111111"),
    array("易渤佩", "1111111111", "1111111111"),
    array("林鹏飞", "1111111111", "1111111111"),
    array("陈哲远", "1111111111", "1111111111"),
);
$outnum = count($sushe);
for ($i = 0; $i < $outnum; $i++) {
    $innernum = count($sushe[$i]);
    for ($j = 0; $j < $innernum; $j++) {
        echo $sushe[$i][$j] . " ";
    }

    echo "<br/>";
}
?>
</body>
</html>