<?php

namespace App\Controller;

use App\Class\Torneo;
use App\Model\TorneoModel;

class TorneoController
{
    public function index(){
        //Mostrar todos los elementos

        //Buscar todos los elemento en la base de datos
        $torneos = TorneoModel::mostrarTorneos();

        //Generar una vista que muestre todos los elementos
        include_once "app/View/mostrarTorneos.php";

    }
    public function show($idTorneo){
        //Mostrar un solo elemento
        $torneo = TorneoModel::mostrarTorneo($idTorneo);

        include_once "app/View/mostrarTorneo.php";
    }

    public function create(){
        //Mostrar formulario para crear un elemento
        return include_once "app/View/crearTorneos.php";
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
        $put = json_decode(file_get_contents('php://input'),true);
        $put['id']=$idTorneo;
        $nuevosDatosTorneo = Torneo::createFromArray($put);

        $resultado = TorneoModel::modificarTorneo($nuevosDatosTorneo);
        if ($resultado){
            return "Todo Ok";
        }else{
            return "Hay un error";
        }



    }

    public function delete($idTorneo){
        //Borrar un elemento
        if(TorneoModel::borrarTorneo($idTorneo)){
            return "Se ha borrado";
        }else{
            return "Ha habido un problema";
        }
    }

}