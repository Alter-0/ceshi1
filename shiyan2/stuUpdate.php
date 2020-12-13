<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加记录</title>
</head>
<style>
    #content {
        width: 600px;
        border: solid 1px #6699FF;
        padding: 30px;
        margin: 50px auto;
    }
    #left {
        float: left;
        width: 350px;
        height: 300px;
    }
    #right {
        float: left;
        width: 250px;
        height: 300px;
    }
    #bottom {
        clear: both;
        width: 600px;
    }
    label {
        width: 50px;
        display: block;
        float: left;
    }
    #pic {
        width: 120px;
        height: 160px;
        background: #cccccc;
        padding: 10px;
    }
    #pic img {
        width: 120px;
        height: 160px;
    }
    .error {
        color: #F00;
    }
</style>
<script type="text/javascript">
    window.onload = function () {
        var fileTag = document.getElementById('file');
        fileTag.onchange = function () {
            var file = fileTag.files[0];
            if (!/image\/\w+/.test(file.type)) {
                alert("请选择图片类型的文件！");
                return false;
            }
            var fileReader = new FileReader();
            fileReader.onloadend = function () {
                if (fileReader.readyState == fileReader.DONE) {
                    document.getElementById('img').setAttribute('src', fileReader.result);
                }
            };
            fileReader.readAsDataURL(file);
        };
    };
</script>
<body>
<?php
include "conn.php";
$result = mysqli_query($conn, "SET NAMES UTF8") or die("数据查询失败");
$sql = "select * from major";
$result = mysqli_query($conn, $sql) or die("数据查询失败");
$stu_get=$_GET["stu_no"];
$sql="select * from student where stu_no='$stu_get'";
$result_stu=mysqli_query($conn,$sql)or die("数据查询失败");
$row_stu=mysqli_fetch_assoc($result_stu);
$noErr = $nameErr = $majorErr = $photoErr = $telephoneErr = $emailErr = $birthdateErr = "";
function filterInput($data)
{
    $data = trim($data);//不必要的字符 (如：空格，tab，换行)。
    $data = stripslashes($data);//去除反斜杠 (\)
    $data = htmlspecialchars($data);//把一些预定义的字符转换为 HTML 实体
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stu_no = $_POST["stu_no"];
    $stu_name = $_POST["stu_name"];
    $major = $_POST["major"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $resume = $_POST["resume"];
    $stu_no = filterInput($stu_no);
    $stu_name = filterInput($stu_name);
    if (empty($stu_no)) {
        $noErr = "学号为空";
    };
    if (empty($stu_name)) {
        $nameErr = "姓名为空";
    };
    if (empty($major)) {
        $majorErr = "专业为空";
    };
    if (empty($birthdate)) {
        $birthdate = "1970-01-01";
    } else {
        if (!(preg_match("/^\d{4}-\d{1,2}-\d{1,2}/", $birthdate))) {
            $birthdateErr = "日期不规范";
        }
    };
    if (!(empty($telephone))) {
        if (!(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/", $telephone))) {
            $telephoneErr = "电话号码不规范";
        }
    };
    if (!(empty($email))) {
        if (!(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))) {
            $emailErr = "邮箱不规范";
        }
    };
    if (($noErr == '') && ($nameErr == '') && ($majorErr == '') && ($birthdateErr == '') && ($telephoneErr == '') && ($emailErr == '')) {
        //判断学号是否重复
        $sql = "select * from student where stu_no=$stu_no and stu_no<>'$stu_get'";
        $result1 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result1) > 0) {
            $noErr = "学号重复";
        } else {
            $photo = "";
            if (!(empty($_FILES["file"]["name"]))) {
                if ($_FILES["file"]["error"] > 0) {
                    $photoErr = "照片上传失败，错误号:" . $_FILES["file"]["error"];
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "photos/" . $_FILES["file"]["name"]);
                    $photo = "photos/" . $_FILES["file"]["name"];
                }
            }
//            $sql="insert into student(stu_no,stu_name,major_id,gender,birthdate,telephone,email,photo,resume) value('$stu_no','$stu_name','$major','$gender','$birthdate','$telephone','$email','$photo','$resume')";
            $sql="update student set stu_no='$stu_no',stu_name='$stu_name',major_id='$major',gender='$gender',birthdate='$birthdate',telephone='$telephone',email='$email',photo='$photo',resume='$resume' where stu_no='$stu_get'";
            $result2=mysqli_query($conn,$sql) or die("修改失败".$sql);
            header("location:stuBrowse.php");
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('学生修改成功');";
            echo "</script>";
        }
    }
}
?>
<form
        name="form1"
        method="post"
        action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data"
>
    <div id="content">
        <div id="left">
            <p><label>学号</label><span><input type="text" name="stu_no" value="<?php echo $row_stu["stu_no"] ?>"/></span><span
                        class='error'>*<?php echo $noErr; ?></span></p>
            <p><label>姓名</label><span><input type="text" name="stu_name" value="<?php echo $row_stu["stu_name"] ?>"/></span><span
                        class="error">*<?php echo $nameErr; ?></span></p>
            <p><label>专业</label><span>
                <select name="major">
                    <option value="">请选择</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['major_id'] ?> "
                        <?php
                        if($row['major_id']==$row_stu['major_id'])
                            echo "selected='select'";
                        ?>>
                    <?php echo $row['major_name'] ?>
                    </option>
                    <?php } ?>
                    </select></span><span class="error">*<?php echo $majorErr; ?></span></p>
            <p><label>性别</label><span>
                男<input name="gender" type="radio" value="男" <?php if ($row_stu["gender"]=='男') echo "checked"; ?>/>
                女<input name="gender" type="radio" value="女"<?php if ($row_stu["gender"]=='女') echo "checked"; ?>/></span></p>
            <p><label>生日</label><span><input type="date" name="birthdate" value="<?php echo $row_stu["birthdate"] ?>"/></span><span
                        class="error"><?php echo $birthdateErr; ?></span></P>
            <p><label>电话</label><span><input type="text" name="telephone" value="<?php echo $row_stu["telephone"] ?>"/></span><span
                        class="error"><?php echo $telephoneErr; ?></span></p>
            <p><label>邮箱</label><span><input type="text" name="email" value="<?php echo $row_stu["email"] ?>"/></span><span
                        class="error"><?php echo $emailErr; ?></span></p></div>
        <div id="right">
            <p><label>照片</label>
                <span><input type="file" name="file" id="file"/></span><span
                        class="error"><?php echo $photoErr; ?></span>
            </p>
            <div id="pic">
                <img id="img" src="<?php  if (empty($row_stu["photo"])) echo "暂无照片"; else echo $row_stu["photo"] ?>"/>
            </div>
        </div>
        <div id="bottom">
            <p>个人简介
                <script id="container" name="resume" type="text/plain">
                      <?php $row_stu["resume"]; ?>
                </script>
            </p>
            <p>
                <input name="submit" type="submit" value="提交"/>
                <input name="reset" type="reset" value="重置"/>
            </p>
        </div>
    </div>
</form>
<!-- 配置文件 -->
<script type="text/javascript" src="ueditor\ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor\ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var editor = UE.getEditor('container');
</script>
</body>
</html>