<?php

abstract class Dato
{
}

trait Identificable
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}

class Categoria extends Dato 
{
    use Identificable;

    private  $nombre;
  

    public function __construct( int $id, string $nombre)
    {
        $this->setId($id);
        $this->setNombre($nombre);
       

    }

    public function getNombre():string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

   
}