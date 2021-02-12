<?php

class Input
{
    public static function siEnviado()
    {
        return (!empty($_POST)) ? true : false;
    }


    /**
     * El metodo get($dato) devolverá el dato si está definido y sino devolverá ""
     * @param string o array $dato
     * @return string o el array $campo
     */
    public static function get($dato)
    {

        if (isset($_POST[$dato])) {
            $campo = $_POST[$dato];
            $campo = Input::filtrarDato($campo);
        } else {
            $campo = "";
        }

        return $campo;
    }

    /**
     * @param string o array $datos
     * @return string o los $datos
     */

    public static function filtrarDato($datos)
    {
        if (is_array($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $datos[$i] = htmlspecialchars(stripslashes(trim($datos[$i])));
            }
        } else {

            $datos = htmlspecialchars(stripslashes(trim($datos)));
        }
        return $datos;
    }
}
