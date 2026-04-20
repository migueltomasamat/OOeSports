<?php

namespace App\Model;

use App\Class\Torneo;
use PDO;
use PDOException;

class TorneoModel
{

    public static function obtenerID():int{

        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql = "SELECT count(*)+1 as nextId FROM torneos";
        $stmt = $conexion->prepare($sql);

        $stmt->execute();

        $siguienteID = $stmt->fetch(PDO::FETCH_NUM);

        return $siguienteID[0];

    }

    public static function guardarTorneo(Torneo $torneo):bool{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }
        $sql = "INSERT INTO torneos(id, nombre, fecha, premio_total) VALUES (:id,:nombre,STR_TO_DATE(:fecha,'%Y-%c-%d'),:premio)";
        $stmt = $conexion->prepare($sql);

        $stmt->bindValue(':id',$torneo->getId());
        $stmt->bindValue(':nombre',$torneo->getNombre());
        $stmt->bindValue(':fecha',$torneo->getFecha()->format('Y-m-d'));
        $stmt->bindValue(':premio',$torneo->getPremioTotal());

        $stmt->execute();

        if($stmt->rowCount()!=0){
            return true;
        }else{
            return false;
        }

    }

}