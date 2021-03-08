<?php

class Articulo
{
    private $nombre;
    private $descripcion;
    private $categoria;
    private $localizacion;
    private $fechaCreacion;
    private $stockDispo;
    private $codProd;

    function __construct($nombre, $descripcion, $categoria, $localizacion, $fechaCreacion, $stockDispo, $codProd)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->localizacion = $localizacion;
        $this->fechaCreacion = $fechaCreacion;
        $this->stockDispo = $stockDispo;
        $this->codProd = $codProd;
    }

    function getNombre()
    {
        return $this->nombre;
    }


    function getDescripcion()
    {
        return $this->descripcion;
    }


    function getCategoria()
    {
        return $this->categoria;
    }


    function getLocalizacion()
    {
        return $this->localizacion;
    }


    function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }


    function getStockDispo()
    {
        return $this->stockDispo;
    }


    function getCodProd()
    {
        return $this->codProd;
    }


    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


    function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }


    function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setStockDispo($stockDispo)
    {
        $this->stockDispo = $stockDispo;
    }

    function setCodProd($codProd)
    {
        $this->codProd = $codProd;
    }
}
