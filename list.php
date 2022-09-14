<?php
//REVISAR LOS UL Y LOS LI PARA QUE SE ADAPTEN LUEGO AL BOOTSTRAP Y/O DISEÑO
include_once("iconos.php");

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
                                echo "<li><a href='index.php?name=$path' > $entry </a></li>";//Cambiar el href para situar la carpeta
                                printFolders($path);
                            }
                            
                        }
                  
             }
             closedir($doc);
             echo "</ul>";
       }
   
}




function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function getInfo($a){//Información necesaria que te piden de los directorios y archivos

echo date("F d Y H:i:s.", filemtime($a));//last modification
echo date("F d Y H:i:s.", filectime($a));//creation day
echo formatSizeUnits(filesize($a));
}
function actionList(){
    $folder= $_GET["name"];
    
    if(is_dir($folder)){
        $doc=opendir($folder);
                echo "<ul>";
                 while(false !== ($entry = readdir($doc))){
                        if($entry!= "." && $entry!=".."){
                         $path=$folder."/".$entry;
                         if(is_dir($path)){

                            echo "<li><a href='index.php?name=$path'> $entry </a></li>";//Cambiar el href para situar la carpeta
                            echo "<li><a href='index.php?remove=$path'> Eliminar $entry </a></li>";
                            

                    } else{
                        echo "<li><a href='$path' target='_blank'> $entry </a></li>"; //Cambiar el href para situar la carpeta

                            Imagens($path);

                         }


                        }
             }
             closedir($doc);
             echo "</ul>";
    }
}


?>