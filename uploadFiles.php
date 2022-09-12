<?php 

include_once('listFolder.php');
$formats =array('jpg','doc','csv','png','txt','ppt','odt','pdf','zip','rar','exe','svg','mp3','mp4');

if(isset($_POST['button'])){

   
    $fileName=$_FILES['file']['name'];
    $fileDestination=$_POST['fileDestination']."/".$fileName;

  

   

    $fileTempName=$_FILES['file']['tmp_name'];
    

    $extensionFile = pathinfo($fileName,PATHINFO_EXTENSION );
 

    if(in_array($extensionFile,$formats)){
        if(move_uploaded_file($fileTempName,$fileDestination)){
            echo "Archivo Subido";
        }else{
            echo "error";
        }

    }else{
        echo 'Archivo no valido';
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UploadFiles</title>
</head>
<body>
    <form action="./uploadFiles.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <label for="">Nombre Carpeta</label>
            <select name="fileDestination">
                <?php printSelectionFolders('./roots'); ?>
            </select>
        <input type="submit" value="Upload file" name ="button">

    </form>
</body>
</html>