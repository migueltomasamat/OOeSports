<?php

namespace App\Class;

class Equipo
{
    private int $id;
    private string $nombre;
    private string $region;
    private float $win_rate;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Equipo
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Equipo
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): Equipo
    {
        $this->region = $region;
        return $this;
    }

    public function getWinRate(): float
    {
        return $this->win_rate;
    }

    public function setWinRate(float $win_rate): Equipo
    {
        $this->win_rate = $win_rate;
        return $this;
    }

    public static function createFromArray (array $datos):Equipo{
        $equipo = new Equipo();
        if (isset($datos['id'])){
            //Este viene de la base de datos
            $equipo->setId($datos['id']);
        }else{
            //Este me lo han pasado desde un formulario o Postman
            $equipo->setId(JugadorModel::nextId());
        }
        $equipo->setNombre($datos['nombre']);
        $equipo->setRegion($datos['region']);
        $equipo->setWinRate($datos['winrate']);
        return $equipo;
    }







}