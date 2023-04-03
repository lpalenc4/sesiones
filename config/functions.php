<?php

function getFolderProyect(){
    if (strpos(__DIR__, '/') !== false){
        $folder = str_replace('/xampp1/htdocs/', '/', __DIR__);
    }else{
        $folder = str_replace('C:\\xampp1\\htdocs\\', '/', __DIR__);    
    }
    $folder = str_replace('config', '', $folder);
return $folder;
}
?>