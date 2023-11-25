<?php


spl_autoload_register('myAutoLoader');
// spl_autoload_register('myViewAutoLoader');
// spl_autoload_register('myControllerAutoLoader');

function myAutoLoader($className){
    if(str_contains($className,"Model")){
        $path = "classes/model/";
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;

        include_once $fullPath;
    }
    else if(str_contains($className,"View")){
        $path = "classes/view/";
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;

        include_once $fullPath;
    }
    else if(str_contains($className,"Contr")){
        $path = "classes/controller/";
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;
        
        include_once $fullPath;
    }
}
// function myViewAutoLoader($className){
//     $path = "classes/view/";
//     $extension = ".class.php";
//     $fullPath = $path . $className . $extension;
    
//     include_once $fullPath;
// }
// function myControllerAutoLoader($className){
//     $path = "classes/Controller/";
//     $extension = ".class.php";
//     $fullPath = $path . $className . $extension;
    
//     include_once $fullPath;
// }