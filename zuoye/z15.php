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
function cheng($a,$b) {
    $c=$a*$b;

    echo $a."×".$b."=".$c." ";
}
function chengfa($d)
{
    for ($i = 1; $i <= $d; $i = $i + 1) {
        cheng($i, $d);
    }
    echo "<br>";
}
for($j = 1; $j <= 9; $j = $j + 1){
    chengfa($j);
}
?>

</body>
</html>
