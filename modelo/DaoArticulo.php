<?php
require_once 'Database.php';

class DaoArticulo
{
    private $db;

    function __construct()
    {
        $this->db = new DataBase();
    }
    function existeArticulo($codProd)
    {
        //Se conecta la db 
        $this->db->conectar();
        //busca el nombre
        $sql = "Select * FROM articulo where codProd =  $codProd ";
        //ejecutamos la consulta
        $result = $this->db->ejecutarSql($sql);
        //Se recoge el resultado
        /*$this->db->desconectar();*/
        //Y se devuelve el resultado
        return $result-> fetch();
    }


    function insertarArticulo($articulo)
    {
        $this->db->conectar();
        //Se conecta a la BD para realizar la inserción de un registro en la 
        // tabla con control de errores
        // $sql = "INSERT INTO articulo (nombre, descripcion, categoria, localizacion, fechaCreacion, stockDispo, codProd) VALUES ('' , '' , '', '', '','','')";
         
        $sql = "INSERT INTO articulo (nombre, descripcion, categoria, localizacion, fechaCreacion, stockDispo, codProd) VALUES (?,?,?,?,?,?,?)";
        //$sql = "Insert Into articulo(nombre, descripcion, categoria, localizacion, fechaCreacion, stockDispo, codProd) VALUES ('$nombre' , '$descripcion' , '$categoria', '$localizacion', '$fechaCreacion','$stockDispo','$codProd')";
        //Se crea el array de argumentos para ejecutar la consulta
        $args = array(
            $articulo->getNombre(), $articulo->getDescripcion(),
            $articulo->getCategoria(), $articulo->getLocalizacion(),
            $articulo->getFechaCreacion(),$articulo->getStockDispo(), $articulo->getCodProd()
        );
        /*$args = array(
            utf8_decode($articulo->getNombre()), $articulo->getDescripcion(), $articulo->getCodProd());*/
        try  {
            $this->db->ejecutarSqlActualizacion($sql, $args);
        } catch (Exception $exc) {
        }
        //Se desconecta la DB
        $this->db->desconectar();
    }
}
