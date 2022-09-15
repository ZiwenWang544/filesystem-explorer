<?php
//REVISAR LOS UL Y LOS LI PARA QUE SE ADAPTEN LUEGO AL BOOTSTRAP Y/O DISEÑO
include_once("iconos.php");
require_once('crud.php');

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

function getInfoSize($a){
echo formatSizeUnits(filesize($a));
}
function getInfoModification($a){
echo date("F d Y H:i:s.", filemtime($a));//last modification
}
function getInfoCreation($a){
echo date("F d Y H:i:s.", filectime($a));//creation day
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
                                            ?>
                            <div class="row">
                                <div class="col"><a href='index.php?name= <?php echo $path?>'> <?php echo $entry?> </a></div>
                                <div class="col"><?php getInfoSize($path)?></div>
                                <div class="col"><?php getInfoModification($path)?></div>
                                <div class="col"><?php getInfoCreation($path)?></div>
                                <div class="col"><a href='index.php?remove= <?php echo $path?>'>Eliminar  </a></div>

                           
                            
<?php
                    } else{
                        ?>
                       
                        <div class="row">
                                <div class="col"><a href='<?php echo $path?>' target='_blank'> <?php Imagens($path)?></a></div>
                                <div class="col"><?php getInfoSize($path)?></div>
                                <div class="col"><?php getInfoModification($path)?></div>
                                <div class="col"><?php getInfoCreation($path)?></div>
                                <div class="col"></div>
                            </div>
                            <?php



                         }


                        }
             }
             closedir($doc);
             echo "</ul>";
    }
}


?>