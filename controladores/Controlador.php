
<?php
class Controlador
{
    public function run()
    {
        if (!isset($_POST['guardar'])) //no se ha enviado el formulario
        { // primera petición
            //se llama al método para mostrar el formulario inicial
            $this->mostrarFormulario("validar", null, null);
            exit();
        } else {
            $resultado = "Has añadido al inventario:  ";
            //el formulario ya se ha enviado
            //se recogen y procesan los datos
            //se llama al método para mostrar el resultado
            if (!empty($nombre = $_POST['nombre'])) {
                $nombre = $_POST['nombre'];
                $resultado .=  " el producto " . " $nombre <br />";
            }
            if (!empty($nombre = $_POST['descripción'])) {
                $descripción = $_POST['descripción'];
                $resultado .=  "Su descripcion es:  " . " $descripción <br />";
            }
            if (isset($_POST['categoria'])) {
                $categoria = $_POST['categoria'];
                $resultado .= "Corresponde a la categoría de: ";
                switch ($categoria) {
                    case "cosmeticos":
                        $resultado .= "cosméticos <br />";
                        break;
                    case "alimentos":
                        $resultado .= "alimentos <br />";
                        break;
                    case "productos":
                        $resultado .= "productos tecnológicos <br />";
                        break;
                }
            }

            if (!empty($localizacion = $_POST['localizacion'])) {
                $localizacion = $_POST['localizacion'];
                $resultado .=  "La localizacin del producto es:  " . " $localizacion <br />";
            }


            if (!empty($fechaCreacion = $_POST['fechaCreacion'])) {
                $fechaCreacion = $_POST['fechaCreacion'];
                $resultado .=  "Se ha creado en la fecha:  " . " $fechaCreacion <br />";
            }

            if (!empty($stockDispo = $_POST['stockDispo'])) {
                $stockDispo = $_POST['stockDispo'];
                $resultado .=  "Las existencias disponibles son:  " . " $stockDispo <br />";
            }


            if (!empty($codProd = $_POST['codProd'])) {
                $codProd = $_POST['codProd'];
                $resultado .=  "El código del producto es:  " . " $codProd <br />";
            }

            /*$referencias = $_POST['referencias'];
            $resultado .= "codigo: $refunction validarferencias";
            $this->mostrarResultado($resultado);
            exit();*/

            $resultado .= "<br />";
            $this->mostrarResultado($resultado);
            exit();
        }
    }
    private function mostrarFormulario($fase, $validador, $resultado)
    {
        //se muestra la vista del formulario (la plantilla form_bienvenida.php)   
        include 'vistas/form_bienvenida.php';
    }
    /**
     * Mostrar el formuario y el resultado. SPA
     * @param string $resultado muestra el mensaje
     */

    private function crearReglasDeValidacion()
    {
        $reglasValidacion = array(
            "nombre" => array("required" => true),
            "descripción" => array("required" => true),
            "categoria" => array("required" => true),
            "localizacion" => array("required" => true),
            "fechaCreacion" => array("required" => true),
            "stockDispo" => array("required" => true),
            "codProd" => array("required" => true)
        );

        return $reglasValidacion;
    }

    private function validar()
    {

        $validador = new validadorForm();
        $reglasValidacion = $this->crearReglasDeValidacion();
        $validador->validar($_POST, $reglasValidacion);
        if ($validador->esValido()) {


            $this->mostrarFormulario("continuar", $validador, $resultado);
            exit();
        }
        $this->mostrarFormulario("validar", $validador, $resultado);
        exit();
    }
    private function mostrarResultado($resultado)
    {
        // y se muestra la vista del resultado (la plantilla resultado.,php)
        include 'vistas/form_bienvenida.php';
    }
}
