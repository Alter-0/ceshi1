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
<form action="z18.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名称:</label>
    <input type="file" name="file" id="file"/>
    <input type="submit" name="submit" value="上传"/>

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_FILES["file"]["error"] > 0) {
        echo "错误信息 " . $_FILES["file"]["error"] . "<br />";
    } else {
        echo "文件名称 " . $_FILES["file"]["name"] . "<br />";
        echo "类型 " . $_FILES["file"]["type"] . "<br />";
        echo "大小" . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "临时存储位置" . $_FILES["file"]["tmp_name"]."<br />";
    }


    move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        "wenjian/" . $_FILES["file"]["name"]);
    echo "最终上传位置"."wenjian/".$_FILES["file"]["name"];
}

?>
</body>
</html>