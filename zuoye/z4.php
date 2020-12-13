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
$num=2;
$numsum=2;
echo $num;
do{
    $num +=2;
    echo "+".$num;
    $numsum+=$num;
}while($num<100);
echo "=".$numsum;
?>
</body>
</html>
