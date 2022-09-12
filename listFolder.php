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








