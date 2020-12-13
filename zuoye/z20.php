<?php
$conn = mysqli_connect("localhost", "root", "", "gch") or die("数据库连接失败");
mysqli_query($conn, "SET NAMES UTF8");
$sql="INSERT INTO `gch` (`name`, `no`, `phone`) VALUES ('陈哲远', '111111111111', '11111111111');";
$result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");
$sql="INSERT INTO `gch` (`name`, `no`, `phone`) VALUES ('林鹏飞', '111111111111', '11111111111');";
$result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");
$sql="INSERT INTO `gch` (`name`, `no`, `phone`) VALUES ('易渤佩', '111111111111', '11111111111');";
$result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");
$sql="INSERT INTO `gch` (`name`, `no`, `phone`) VALUES ('马瑞龙', '111111111111', '11111111111');";
$result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");
$sql="INSERT INTO `gch` (`name`, `no`, `phone`) VALUES ('何福雨', '111111111111', '11111111111');";
$result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语法");

$sql="UPDATE `gch` SET `phone` = '22222222' WHERE `gch`.`name` = '陈哲远';";
$result = mysqli_query($conn, $sql) or die("修改失败，请检查SQL语法");


$sql="DELETE FROM `gch` WHERE `gch`.`name` = '高辰浩';";
$result = mysqli_query($conn, $sql) or die("删除失败，请检查SQL语法");