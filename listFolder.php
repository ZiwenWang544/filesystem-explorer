<?php
//REVISAR LOS UL Y LOS LI PARA QUE SE ADAPTEN LUEGO AL BOOTSTRAP Y/O DISEÑO

// PRINT ALL DIRECTORIES SELECT
function printSelectionFolders($a){
    if(is_dir($a)){
   
          $doc=opendir($a);
              echo "<ul>";
               while(false !== ($entry = readdir($doc))){

                      if($entry!= "." && $entry!=".."){

                            $path=$a."/".$entry;
                            
                          if(is_dir( $path)){
                                echo '<option value ="'.$path.'">'.$entry.'</option>';
                                printSelectionFolders( $path);
                          }
                          
                      }
                
           }
           closedir($doc);
           echo "</ul>";
     }
 
}

// PRINT ALL DIRECTORIES  LEFT
function printFolders($a){
      if(is_dir($a)){
     
            $doc=opendir($a);
                echo "<ul>";
                 while(false !== ($entry = readdir($doc))){
                        if($entry!= "." && $entry!=".."){
                            $path=$a."/".$entry;
                         
                            if(is_dir($path)){
                                echo "<li><a href='listFolder.php?name=$path'> $entry </a></li>";//Cambiar el href para situar la carpeta
                                printFolders($path);
                            }
                            
                        }
                  
             }
             closedir($doc);
             echo "</ul>";
       }
   
}

printFolders('./roots');



if(isset($_GET["name"])){
    $folder= htmlspecialchars($_GET["name"]);
    if(is_dir($folder)){
        $doc=opendir($folder);
                echo "<ul>";
                 while(false !== ($entry = readdir($doc))){
                        if($entry!= "." && $entry!=".."){
                         
                           
                                echo "<li><strong>$entry</strong></li>";
                                
                            
                            
                        }
                  
             }
             closedir($doc);
             echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="<?php echo $_SERVER["PHP_SELF"]?>"> <!--cambiar el action para el archivo que se quiera -->
    <label for="">Nombre Carpeta</label>
    <select name="folder">
        
        <?php printSelectionFolders('./roots'); ?>
    </select>
    <input type="submit" value="Buscar" name="listFolder">
   </form>
</body>
</html>








