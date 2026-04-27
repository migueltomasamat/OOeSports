<?php

namespace App\Class;

use App\Model\TorneoModel;
use DateTime;

class Torneo
{
    private int $id;
    private string $nombre;
    private DateTime $fecha;
    private float $premio_total;

    private array $equipos;

    public function __construct()
    {
        $this->equipos=[];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Torneo
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Torneo
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    public function setFecha(\DateTime $fecha): Torneo
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getPremioTotal(): float
    {
        return $this->premio_total;
    }

    public function setPremioTotal(float $premio_total): Torneo
    {
        $this->premio_total = $premio_total;
        return $this;
    }

    public function getEquipos(): array
    {
        return $this->equipos;
    }

    public function setEquipos(array $equipos): Torneo
    {
        $this->equipos = $equipos;
        return $this;
    }

    //Añadir un equipo al array $equipos del Torneo
    public function addEquipo(Equipo $equipoAIncluir):bool{
        $this->equipos[]=$equipoAIncluir;
        return true;
    }

    //Buscar un equipo dentro del array
    public function buscarEquipo(Equipo $equipoABuscar):int|false{

        for($i=0;$i<count($this->equipos);$i++){
            if($this->equipos[$i]->getId()===$equipoABuscar->getId()){
                return $i;
            }
        }
        return false;
    }

    //Borrar un equipo dentro del array

    public function borrarEquipo(Equipo $equipoABorrar):bool{

        $indice=$this->buscarEquipo($equipoABorrar);
        if($indice){
            unset($this->equipos[$indice]);
            return true;
        }else {
            return false;
        }
    }

    //Actualizar un equipo dentro del array
    public function actualizarEquipo(Equipo $equipoAActualizar):bool{
        $indice=$this->buscarEquipo($equipoAActualizar);
        if($indice){
            $this->equipos[$indice]=$equipoAActualizar;
            return true;
        }else {
            return false;
        }
    }

    //Calcular la media del win-rate de los equipos del array
    public function mediaWinRateEquipos():float{

        $num_elementos=count($this->equipos);
        $acumulador=0;

        foreach ($this->equipos as $equipo){
            $acumulador+=$equipo->getWinRate();
        }
        return $acumulador/$num_elementos;
    }

    public static function createFromArray(array $data):Torneo
    {
        $torneo = new Torneo();
        if (isset($data['id'])){
            //Esto es una actualización
            $torneo->setId($data['id']);
        }else{
            //Esto es una creación de un nuevo torneo
            $torneo->setId(TorneoModel::obtenerID());
        }

        $torneo->setNombre($data['nombre']);
        $torneo->setFecha(DateTime::createFromFormat('Y-m-d',$data['fecha']));
        $torneo->setPremioTotal($data['premio_total']);

        return $torneo;
    }

    public function borrar(){
        TorneoModel::borrarTorneo($this->id);
    }



}