<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload video</title>
    <link rel="stylesheet" href="main.css">
    <?php 
     include('config.php');
     $subject='';
     $title= '';
     //Vérifie si le champ subject est envoyé via le formulaire
     if(isset($_POST['subject'])){
        $subject= $_POST['subject'];
     }
     if(isset($_POST['title'])){
        $title= $_POST['title'];
     }
     //$_POST['but_upload'] : Vérifie que le bouton d'envoi a été cliqué.
     //$_FILES['file'] : Contient les infos du fichier uploadé (nom, type, taille…).
     //$maxsize = 5242880 : Taille maximale (5 Mo).
     //$target_dir : Dossier où sera sauvegardé le fichier.
     //$target_file : Chemin complet de destination.
     if(isset($_POST['but_upload'])){
        $maxsize = 5242880000 ;
        $name = $_FILES['file']['name'];
        $target_dir ="video/";
        $target_file=$target_dir .$_FILES['file']['name'];
        $location = $target_file;
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extenstion_arr =array("mp4","mpeg","avi","3gp");
        if(in_array($videoFileType,$extenstion_arr)){
            if(($_FILES['file']['size']>=$maxsize)||($_FILES['file']['size']==0)){
                echo "<center>
                <h3 class='faild'>le video est trop long </video></h3>
                </center>";
            }else{
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
$query = "INSERT INTO videos (name, location, subject, title) 
          VALUES ('$name', '$location', '$subject', '$title')";
                    mysqli_query($con,$query);
                    echo "<center><h3 class='succes'>Le video est afficher sur l''acceuil</h3></center>";
               
                }
            }
        }else{
            echo "<center><h3 class='choose'> Pas de video</h3></center>";
        }
     }
      
     ?>
</head>
<body>
    <div class="container">
        <center>
            <img src="iamges/123.jpeg" >
        </center>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <br>
                <input type="text" name="subject" id="subject" placeholder="donner un titre">
                <br>
                <input type="text" name="title" id="title" placeholder="description">
                <br>
                <input type="submit" value="Partager" name="but_upload">
                <a href="http://localhost/koran%20karim/readvideo.php">🏠 Retour à l'accueil</a>
            </form>
        </div>
    </div>
</body>
</html>