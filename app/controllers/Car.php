<?php

namespace app\controllers;

class Car
{

    public function delete($params)
    {
        $car = intval($params['delete']);
        if (carExists("id", $car, "id")) {
            if (deleteCar("id", $car)) {
                setFlash("deleteCarSuccess", "Carro deletado com sucesso!");
                return redirect("/");
            }
        }
        setFlash("deleteCarError", "Erro ao deletar o carro");
        return redirect("/");
    }

    public function create()
    {

        return [
            'view' => "createCar.php",
            'data' => [],
            'title' => 'Register Car'
        ];
    }
    public function insert()
    {

        if (isset($_POST['submit'])) {

            $validate = validate([
                'vni' => 'required',
                'carMake' => 'required',
                'carModel' => 'required',
                'carModelYear' => 'maxlen:4'
            ]);
            if (!$validate) {
                return redirect('/car/create');
            }
           
            if(insertIntoCar(array_values($validate))){
                return redirect("/");
            }else{
                setFlash("errorInsertCar","Erro ao inserir o carro");
                return redirect("/car/create");
            }

        }
    }
}
