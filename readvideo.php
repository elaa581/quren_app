<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app-vedio">
        <?php 
        $fetchAllVideos=mysqli_query($con,"SELECT * FROM videos ORDER BY id DESC");
        while($row= mysqli_fetch_assoc($fetchAllVideos)){
            $location = $row['location'];
            $subject = $row['subject'];
            $title =$row['title'];

           echo '<div class="vedio">';
            echo'<video src="'.$location .'" class="vedio-player"></video>';
            echo'<div class="footer">';
            echo '<div class="footer-text">';
            echo '<h3>Elaa ben yahia</h3>';
            echo' <p class="description">'.$subject .'</p>';
            echo' <div class="img-marq">';
            echo '<a href="http://localhost/koran%20karim/upload.php"><i class="bi bi-download icon-action"></i></a>';
            echo '<marquee>'.$title .' </marquee>';
            echo ' </div>';
            echo '</div>';
            echo '<i class="bi bi-play-circle-fill icon-action"></i>';
            echo '</div>';
        echo '</div>';
        }
        
        
        ?>
    </div>

    <script>
        const vedios = document.querySelectorAll('video');
        for (const video of vedios) {
            video.addEventListener('click', function () {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        }
    </script>
</body>
</html>
