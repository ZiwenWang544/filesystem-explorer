<?php 
//UPLOAD FILE
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
//CREAR ARCHIVO
if(isset($_POST["creation"])){
    $directory=$_POST['directoryCreate'];
    $path=$_POST['fileCreation'];
    $finalDirectory=$path."/".$directory;
   if(!is_dir($finalDirectory)){
    if(mkdir($finalDirectory,0777,true)){
        echo "Directorio $finalDirectory creado correctamente";
    }else{
        echo "ha ocurrido un error al crear  el directorio";
    }

   }else{
    echo "Archivo ya existe";
   }
}
//ELIMINAR ARCHIVO
function removeDir($a){
foreach(glob($a."/*")as $element){
    if(is_dir($element)){

        removeDir($element);
    }else{
        unlink($element);
    }
}
rmdir($a);
}
if(isset($_GET["remove"])){
   
    $pathDelete=$_GET["remove"];
   
    echo $pathDelete;
    if(is_dir($pathDelete)){
        removeDir($pathDelete);
        echo "eliminado correctamente";
    }else {
        echo "error al crear";
    }
}
//RENAME ARCHIVO
if(isset($_POST["rename"])){
    $directory=$_POST['directoryEdit'];
    $path=$_POST['pathEdit'];
    $limit = explode("/", $path,-1);
    print_r( $limit);
    $a="";
    foreach($limit as $parts){
        $a=$a.$parts."/";
    }
   if(is_dir($path)){
    if(rename($path,$a.$directory)){
        echo "Directorio $directory editado correctamente";
    }else{
        echo "ha ocurrido un error al editar  el directorio";
    }

   }else{
    echo "Archivo ya existe";
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
    <h1>SUBIR ARCHIVO</h1>
    <form action="./crud.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <label for="">Nombre Carpeta</label>
            <select name="fileDestination">
                <?php printSelectionFolders('./roots'); ?>
            </select>
        <input type="submit" value="Upload file" name ="button">
    </form>
    <h1>CREAR ARCHIVO</h1>

    <form action="./crud.php" method="post" >
        <label for="">Nombre carpeta</label>
        <input type="text" name="directoryCreate">
        <label for="">Seleccione Carpeta donde almacenar</label>
            <select name="pathEdit">
                <?php printSelectionFolders('./roots'); ?>
            </select>
        <input type="submit" value="Crear carpeta" name ="creation">
    </form>

    <h1>ELIMINAR ARCHIVO</h1>

<form action="./crud.php" method="post" >
   
    <label for="">Seleccione Carpeta que quiera eliminar</label>
        <select name="fileDelete">
            <?php printSelectionFolders('./roots'); ?>
        </select>
    <input type="submit" value="Eliminar carpeta" name ="remove">
</form>
<h1>EDITAR ARCHIVO</h1>

    <form action="./crud.php" method="post" >
        <label for="">Nuevo nombre carpeta</label>
        <input type="text" name="directoryEdit">
        <label for="">Seleccione Carpeta que quiera renombrar</label>
            <select name="pathEdit">
                <?php printSelectionFolders('./roots'); ?>
            </select>
        <input type="submit" value="Renombrar" name ="rename">
    </form>
</body>
</html>