<?php

namespace App\Controller;

use App\Class\Torneo;
use App\Model\TorneoModel;

class TorneoController
{
    public function index(){
        //Mostrar todos los elementos

        //Buscar todos los elemento en la base de datos

        //Generar una vista que muestre todos los elementos


    }
    public function show($idTorneo){
        //Mostrar un solo elemento
    }

    public function create(){
        //Mostrar formulario para crear un elemento
        return include_once "app/View/crearTorneo.php";
    }
    public function store(){
        //Guardar elemento

        var_dump($_POST);
        $torneo=Torneo::createFromArray($_POST);
        if(TorneoModel::guardarTorneo($torneo)){
            return "Se ha guardado correctamente el torneo";
        }else{
            return "Ha habido un problema guardando el torneo";
        }

    }

    public function edit($idTorneo){
        //Mostrar un formulario para editar un elemento
    }
    public function update($idTorneo){
        //Almacenar el elemento editado
    }

    public function delete($idTorneo){
        //Borrar un elemento
    }

}