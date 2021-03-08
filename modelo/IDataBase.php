<?php

interface IDataBase {
    function conectar();
    function desconectar();
    function ejecutarSql($sql);
    function ejecutarSqlActualizacion($sql, $args);
   
}