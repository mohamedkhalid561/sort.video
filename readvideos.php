<?php
include('config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>quran app</title>
</head>
<body>
    
    <div class="app-vedio">
        <?php
       
        $fetchallvidos=mysqli_query($connect,"SELECT *FROM videos ORDER BY id DESC");
        while($row=mysqli_fetch_assoc($fetchallvidos)){
            $location = $row['location'];
            $subject = $row ['subject'];
            $titel = $row['title'];

            echo '<div class="vedio">';
            echo '<video src="'.$location.'"class="video-player"></video>';
            echo '<div class="footer">';
            echo '<div class="footer-text">';
            echo '<h3>mohamed khalid</h3>';
            echo '<p class="description">'.$subject.'</p>';
            echo '<div class="img-marq">';
            echo '<a href="upload.php"><img  src="images/cloudup_icon-icons.com_54402.png"></a>';
            echo '<marquee direction="right">'. $titel.'</marquee>';
            echo '</div>';
            echo '</div> ';
            echo '<img  src="images/pngegg.png"  class="image-play">';
            echo '</div>';
            echo '</div>';
        }
      ?>
    <script>
        const vedios =document.querySelectorAll('video');//حدد كل الفيديوهات
        for(const video of vedios){//طبق على كل الفيديوهات التي بدخل المتغير
            video.addEventListener('click',function(){//عند النقر 
                if(video.paused){//اذا الفيديو متوقف
                    video.play();//شغلو
                }else{//او شغال 
                    video.pause();//وقفو
                }
            })
        }
    </script>
</body>
</html>




