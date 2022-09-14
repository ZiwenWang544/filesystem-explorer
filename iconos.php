<?php




function Imagens($archivos){
    $Doc ="<img src='./path/doc.png' alt=' '> ";
    $Csv ="<img src='./path/csv.png' alt=' '> ";
    $Exe ="<img src='./path/exe.png' alt=' '> ";
    $Jpg ="<img src='./path/jpg.png' alt=' '> ";
    $Mp3 ="<img src='./path/mp3.png' alt=' '> ";
    $Mp4 ="<img src='./path/mp4.png' alt=' '> ";
    $Odt ="<img src='./path/odt.png' alt=' '> ";
    $Pdf ="<img src='./path/pdf.png' alt=' '> ";
    $png ="<img src='./path/png.png' alt=' '> ";
    $Ppt ="<img src='./path/ppt.png' alt=' '> ";
    $Rar ="<img src='./path/rar.png' alt=' '> ";
    $Svg ="<img src='./path/svg.png' alt=' '> ";
    $Txt ="<img src='./path/txt.png' alt=' '> ";
    $Zip ="<img src='./path/zip.png' alt=' '> ";

    $switchimages = pathinfo($archivos,PATHINFO_EXTENSION);

    switch($switchimages){
        case 'doc'; echo $Doc; break;
        case 'csv'; echo $Csv; break;
        case 'exe'; echo $Exe; break;
        case 'jpg'; echo $Jpg; break;
        case 'mp3'; echo $Mp3; break;
        case 'mp5'; echo $Mp4; break;
        case 'odt'; echo $Odt; break;
        case 'pdf'; echo $Pdf; break;
        case 'png'; echo $png; break;
        case 'ppt'; echo $Ppt; break;
        case 'rar'; echo $Rar; break;
        case 'svg'; echo $Svg; break;
        case 'txt'; echo $Txt; break;
        case 'zip'; echo $Zip; break;
    }
}

function imgDirectory($ruta){
    if(is_dir($ruta)){
        $dir1=opendir($ruta);

        while(($file=readdir($dir1)) !==false){

            if($file != "." && $file != ".."){
                if(is_dir($ruta.$file)){
                    imgDirectory($ruta."/".$file);
                }else{
                    Imagens($file);
                    echo "$file";
                }
            }
        }
    }else{
        echo "<br> No es una ruta válida";
    }

}

?>