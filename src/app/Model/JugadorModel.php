<?php

namespace App\Model;

use App\Class\Equipo;
use App\Class\Jugador;
use PDO;

class JugadorModel
{
    public static function nextId():int{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
        $sql = "SELECT count(*)+1 from jugadores";
        $stmt=$conexion->prepare($sql);

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_NUM);

        return $resultado[0];
    }


    public static function getJugador(int $idJugador):Jugador{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
        $sql = "SELECT * from jugadores where id=?";
        $stmt=$conexion->prepare($sql);
        $stmt->bindValue(1,$idJugador);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_NUM);
        $resultado['equipos_favoritos']=JugadorModel::getEquiposFavoritos($idJugador);
        return Jugador::createFromArray($resultado[0]);
    }

    public static function getEquiposFavoritos(int $idJugador):array{
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
        $sql = "SELECT * from jugador_favoritos where jugador_id=?";
        $stmt=$conexion->prepare($sql);
        $stmt->bindValue(1,$idJugador);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $equipos=[];
        foreach ($resultado as $equipo){
            $equipos[]=Equipo::createFromArray($equipo);
        }
        return $equipos;
    }

}