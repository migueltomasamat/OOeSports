<?php

namespace App\Class;

class Jugador
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $nickname;
    private int $nivel;

    private array $equipos_favoritos=[];

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Jugador
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Jugador
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Jugador
    {
        $this->email = $email;
        return $this;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): Jugador
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): Jugador
    {
        $this->nivel = $nivel;
        return $this;
    }

    public function getEquiposFavoritos(): array
    {
        return $this->equipos_favoritos;
    }

    public function setEquiposFavoritos(array $equipos_favoritos): Jugador
    {
        $this->equipos_favoritos = $equipos_favoritos;
        return $this;
    }





}