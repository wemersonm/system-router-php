<?php
namespace app\controllers;

class Home{

    public function index(){
        $dataCars = carsFetchAll();
       return [
        'view' => 'home.php',
        'data' => $dataCars,
        'title' => 'Pagina Inicial'
       ];
    }

}