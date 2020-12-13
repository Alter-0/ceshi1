<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生列表</title>
    <style>
        table {
            margin-top: 50px;
            width: 100%;
            border: 1px solid #66CCFF;
        }

        th {
            text-align: center;
            background-color: #6cb5db;
        }

        tr {
            height: 35px;
        }

        #top {
            margin: 50px auto;
            width: 80%;
            height: 30px;
        }

        a {
            text-decoration: none;
            color: #6666FFF;
        }

        a:hover {
            color: #F96;
        }

        #insert {
            float: left;
        }

        #search {
            float: right;
        }
        #page{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include "islogin.php";
include "conn.php";
mysqli_query($conn, 'set names utf8');
$key="";
$pageSize=2;
$pageNum=empty($_GET["pageNum"])?1:$_GET["pageNum"];

$sql = "select * from student,major where student.major_id=major.major_id";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key=$_POST["key"];
    $sql.=" and ((stu_name like '%$key%') or 
    (stu_no like '%$key%') or
    (major_name like '%$key%') or
    (date_format(birthdate, '%Y%m%d') like '%$key%') or
    (telephone like '%$key%') or
    (email like '%$key%') or
    (resume like '%$key%') or
    (gender like '%$key%'))    
    ";
}
$result=mysqli_query($conn,$sql);
$allNum=mysqli_num_rows($result);
$endPage=ceil($allNum/$pageSize);

$sql.=" order by stu_no limit ".($pageNum-1)*$pageSize.",".$pageSize;
?>
<div id="top">
    <div id="insert">
        <a href="stuInsert.php">添加学生</a>
    </div>
    <div id="search">
        <form action="#" method="post">
            <label>
                <input type="text" name="key" value="<?php echo $key; ?>">
            </label>
            <input type="submit" value="查询">
        </form>
    </div>
</div>
<?php
$result = mysqli_query($conn, $sql) or die("数据查询失败");
if (mysqli_num_rows($result) > 0){
echo "<table align='center'>";
echo "<tr><th>学号</th><th>姓名</th><th>性别</th><th>专业</th><th>生日</th><th>电话</th><th>电邮</th><th></th><th></th><th></th></tr>";
while ($row = mysqli_fetch_assoc($result))
{
?>
<tr onMouseOver="this.style.backgroundColor='#6cf';" onMouseOut="this.style.backgroundColor='#ffffff';">
    <?php
    echo "<td >$row[stu_no]</td>";
    echo "<td>$row[stu_name]</td>";
    echo "<td>$row[gender]</td>";
    echo "<td>$row[major_name]</td>";
    echo "<td>$row[birthdate]</td>";
    echo "<td>$row[telephone]</td><td>$row[email]</td>";
    echo "<td><a href='stuDetail.php?stu_no=$row[stu_no]'>详情</a></td>";
    echo "<td><a href='stuUpdate.php?stu_no=$row[stu_no]'>修改</a></td>";
    echo "<td><a href=javascript:if(confirm('确定要删除吗?'))location='stuDelete.php?stu_no=$row[stu_no]'>删除</a></td>";
    echo "</tr>";
    }
    ?>
    <tr>
        <td colspan="10" id="page">
            <a href="?pageNum=1">首页</a>
            <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
            <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
            <a href="?pageNum=<?php echo $endPage?>">尾页</a>
        </td>
    </tr>
    <?php
    echo "</table>";
    }
    else //没有查询结果
        echo "尚无学生信息";
    ?>
</body>
</html>
