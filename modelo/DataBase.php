<?php
include "IDataBase.php";
include "config/config.php";

class DataBase implements IDataBase
{

    private $conexion;

    function conectar()
    {
        try {
            $this->conexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (Exception $exc) {
            $error = $exc->getMessage();
            include "vistas/error.php";
            exit();
        }
    }

    function desconectar()
    {
        //asigna null a la conexion
        $this->conexion = null;
    }


    function ejecutarSql($sql)
    {
        try {
            $result = $this->conexion->query($sql);
            return $result;
        } catch (Exception $exc) {
            $error = $exc->getMessage();
            include "vistas/error.php";
            exit();
            //devuelve los resultados obtenidos
        }
    }

    function ejecutarSqlActualizacion($sql, $args)
    {
        //control de errores y ejecuta la sentencia de accion.
        try {
            $result = $this->conexion->prepare($sql);
            $result->execute($args);
        } catch (Exception $exc) {
            $error = $exc->getMessage();
            include "vistas/error.php";
            exit();
        }
    }
}
