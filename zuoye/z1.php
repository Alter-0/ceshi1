<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
ini_set('date.timezone','Asia/Shanghai');
$hour=date('H',time());
if($hour<12 and $hour>5){
    echo "高辰浩同学上午好";
}elseif ($hour>=12 and $hour<19){
    echo "高辰浩同学下午好";
}
else{
    echo "高辰浩同学晚上好";
}
?>
</body>
</html>