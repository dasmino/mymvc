<?php 
   class Autoload{
   	   function __construct(){
   	   	  spl_autoload_register([$this,'autoload']);
   	   }

   	   private function autoload($class){
   	   	$rootPath = App::getConfig()['rootPath'];
           $className = end(explode('\\', $class));
           $pathName = str_replace($className, '', $class);
           $filePath = $rootPath.'\\'.$pathName.$className.'.php';

           if(file_exists($filePath)){
           	require_once($filePath);
           }

   	   } 



   }
 ?>