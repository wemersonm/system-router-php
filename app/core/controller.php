<?php 

function controller($matchUri,$params){
    
    list($controller,$method) = explode("@",array_values($matchUri)[0]);
    
    if(!class_exists("app\\controllers\\".$controller)){
       throw new Exception("Classe do controller {$controller} não existe");
    }
    $instanceController = new $controller;
    if(!method_exists($))

    
}