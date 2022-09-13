<?php


function searchbarr($a,$path){

    if($doc=opendir($path)){
        echo "<ul>";
        
        while(false !== ($entry = readdir($doc))){
            if($entry!= "." && $entry!=".."){
                $c=$path."/".$entry;
                $info = pathinfo($c);
                if(stripos($info["filename"], $a) !== false ){
                    if(is_dir($c)){
                        echo "<li><a href='index.php?name=$c'> $entry</a></li>";
                    }else{
                        echo "<li><a href='$c' target='_blank'> $entry </a></li>";
                    }
                }
                if(is_dir($c)){
                    searchbarr($a,$c);
                } 
            }
        echo "</ul>";
        }
    }

}
    
$b=$_GET["search"];


searchbarr($b,"./roots");








// function searchbarr($a){

//     $submit = $_GET["submit"];


//     if(is_dir($a)){

//         $search = opendir($a);
//         if ($gestor = opendir('./roots')) {
            
//             while (false !== ($entrada = readdir($gestor))) {
//                 if ($entrada != "." && $entrada != "..") {
//                     echo "$entrada\n";
//                 }


//             }
//             closedir($gestor);

//     }
// }

// }


?>

