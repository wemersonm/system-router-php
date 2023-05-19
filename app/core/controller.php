<?php 

function controller($matchUri,$params){
    
    list($controller,$method) = explode("@",array_values($matchUri)[0]);
    
    if(!class_exists("app\\controllers\\".$controller)){
       throw new Exception("Classe do controller {$controller} não existe");
    }
    $namespace = "app\\controllers\\";
    $className = $namespace . $controller;
    $instanceController = new $className;
    if(!method_exists($instanceController,$method)){
        throw new Exception("O metodo {$method} não existe no controller {$controller}");
    }
   
   
    $controller =  $instanceController->$method($params);
  
    return $controller;

}