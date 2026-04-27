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

    public static function modificarTorneo(Torneo $torneo):bool{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql = "UPDATE torneos SET nombre=?, fecha=STR_TO_DATE(?,'%Y-%c-%d'),premio_total=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(1,$torneo->getNombre());
        $stmt->bindValue(2,$torneo->getFecha()->format("Y-m-d"));
        $stmt->bindValue(3,$torneo->getPremioTotal());
        $stmt->bindValue(4,$torneo->getId());

        $stmt->execute();

        if ($stmt->rowCount()){
            return true;
        }else{
            return false;
        }
        //return $stmt->rowCount();
    }

    public static function borrarTorneo(int $idTorneo):bool{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql="DELETE FROM torneos WHERE id=:num_torneo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue("num_torneo",$idTorneo);

        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function mostrarTorneos():array{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql="SELECT * FROM torneos";
        $stmt = $conexion->prepare($sql);

        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $arrayTorneos=[];
        foreach ($resultado as $torneo){
            $arrayTorneos[]=Torneo::createFromArray($torneo);
        }

        return $arrayTorneos;
    }

    public static function mostrarTorneo($idTorneo):Torneo{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql="SELECT * FROM torneos WHERE id=:idTorneo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue('idTorneo',$idTorneo);

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return Torneo::createFromArray($resultado);

    }
    public static function mostrarTorneoPorNombre(string $nombreTorneo):Torneo{
        try {
            $conexion = new PDO('mysql:host=mariadb;dbname=examen', 'alumno', 'alumno');
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            return $e->getMessage();
        }

        $sql="SELECT * FROM torneos WHERE nombre=:nombreTorneo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue('nombreTorneo',$nombreTorneo);

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return Torneo::createFromArray($resultado);

    }

}