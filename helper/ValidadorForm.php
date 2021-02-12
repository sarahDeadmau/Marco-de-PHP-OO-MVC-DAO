<?php

class ValidadorForm
{
    private $errores;
    private $reglasValidacion;
    private $valido;


    function __construct()
    {
        $this->errores = array();
        $this->reglasValidacion = null;
        $this->valido = false;
    }

    function validar($fuente, $reglasValidacion)
    {
        $this->reglasValidacion = $reglasValidacion;
        //Comprobar que los campos de fuente cumplen las reglas de validacion

        foreach ($this->reglasValidacion as $campo => $reglasCampo) {
            foreach ($reglasCampo as $regla => $valorRegla) {
                unset($valor);
                if (isset($fuente[$campo])) {
                    $valor = $fuente[$campo];
                }
                if ($regla === 'required' && $valorRegla) {
                    if (empty($valor)) {
                        $this->addError($campo, "¡Error! $campo obligatorio");
                    }
                }
            }
            $this->valido = count($this->errores) == 0;
        }



        //validadorForm-Parte2  

    }
    private function addError($campo, $error)
    {
        $this->errores[$campo] = $error;
    }


    function esValido()
    {
        return $this->valido;
    }


    //Si hay errores se guardan en el array $errores
    function getErrores()
    {
        return $this->errores;
    }


    function getMensajeError($campo)
    {
        //Si está definido en el array $errores 
        //la clave $campo devuelve el valor del array de esa clave
        if (isset($this->errores[$campo])) {

            return $this->errores[$campo];
        }

        return "";
    }
}
