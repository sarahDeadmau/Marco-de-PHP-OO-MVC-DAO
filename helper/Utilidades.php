
    
<?php

class Utilidades
{

    public static function verArray($array)
    {
        echo "</br>";
        print($array);
    }
    public static function verificarCasillas($array, $valor)
    {
        if (!empty($array)) {
            if (in_array($valor, $array)) {
                echo 'checked = "checked"';
            }
        }
    }

    public static function verificarLista($array, $valorlista)
    {
        if ($array == $valorlista) {
            echo 'selected = "selected"';
        }
    }


    public static function verificarBotones($array, $valorBot)
    {
        if ($array == $valorBot) {
            echo 'selected = "selected"';
        }
    }
}
