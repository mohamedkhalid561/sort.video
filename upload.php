<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload vid</title>
    <link rel="stylesheet" href="main.css">
    <?php
    include('config.php');
    $subject='';
    $title='';
    if(isset($_POST['subject'])){
        $subject = $_POST['subject'];
    }
    if(isset($_POST['titel'])){
        $title = $_POST['titel'];
    }

    if(isset($_POST['but_upload'])){
        $maxsize = 5242880 ;//5mb
        $name = $_FILES['file']['name'];
        $target_dir="videos/";//مكان الملف
        $target_file=$target_dir . $_FILES['file']['name'];
        $videofiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extenstions_arr= array("mp4","mpeg","avi","3gp");
        if(in_array($videofiletype,$extenstions_arr)){
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES['file']['size']==0)){
                echo "<center><h3 class='faild'>الملف كبير جدا<h3></center>";
            }else{
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    @$query= "INSERT INTO videos(name,location,subject,title) VALUES('".$name."','".$target_file."','$subject','$title')";
                    mysqli_query($connect,$query);
                    echo "<center><h3 class='succes'>تم الرفع<h3></center>";
                }
            }
           
        }
        else{
            echo "<center><h3 class='chow'>قم بتحديد فيديو<h3></center>";
        }
    }


    ?>
</head>
<body>
    <div class="container">
        <center>
            <img src="images/logo.jpg">
        </center>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="file" >
                <br>
                <input type="text" name="subject" id="subject" placeholder="اكتب عنوانا للفيديو" >
                <br>
                <input type="text" name="titel" id="titel" placeholder="وصف">
                <br>
                <input type="submit" value="رفع الفيديو" name="but_upload">
                <br>
                <a href="readvideos.php" class="linko">الرجوع للتطبيق</a>
            </form>
        </div>
    </div>
</body>
</html>

