<?php
include  "helper/ValidadorForm.php";
include "modelo/DaoArticulo.php";
include "modelo/Articulo.php";
include "helper/Utilidades.php";
include "helper/Input.php";
class Controlador
{
    private $dao;

    public function run()
    {
        if (!isset($_POST["boton"])) //no se ha enviado el formulario
        { // primera petición
            //se llama al método para mostrar el formulario inicial
            $this->mostrarFormulario("validar", null, null);
            exit();
        }
        if (isset($_POST["boton"]) && ($_POST["boton"]) == "validar") {
            $this->validar();
            exit();
        }
        //en caso de querer limpiar el formulario
        if (isset($_POST["boton"]) && ($_POST["boton"]) == "continuar") {
            unset($_POST);
            $this->mostrarFormulario("validar", null, null);
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
            "descripcion" => array("required" => true),
            "categoria" => array("required" => true),
            "localizacion" => array("required" => true),
            "fechaCreacion" => array("required" => true),
            "stockDispo" => array("required "=> true),
            "codProd" => array("required" => true)
        );

        return $reglasValidacion;
    }

//metodo registrar
//si es valido se ejecuta registrar y sino se muestran errores en el formulario.
private function creaArticulo($datos){
    $nombre = htmlspecialchars(stripslashes($datos['nombre']));
    $descripcion = htmlspecialchars(stripslashes($datos['descripcion']));
    $categoria = htmlspecialchars(stripslashes($datos['categoria']));
    $localizacion = htmlspecialchars(stripslashes($datos['localizacion']));
    $fechaCreacion = htmlspecialchars(stripslashes($datos['fechaCreacion']));
    $stockDispo = htmlspecialchars(stripslashes($datos['stockDispo']));
    $codProd = htmlspecialchars(stripslashes($datos['codProd']));
    $articulo = new Articulo($nombre, $descripcion, $categoria, $localizacion, $fechaCreacion, $stockDispo, $codProd);
    return $articulo;

}

    private function registrar($validador){
        $this->dao = new DaoArticulo();
        $articulo = $this->creaArticulo($_POST);
        //se ejecuta el metodo si existe
        $existe = $this->dao->existeArticulo($articulo-> getCodProd());
        //si no existe se ejecuta el metodo instarArticulo.
        if (!$existe){
            $this->dao->insertarArticulo($articulo);
            $resultado = "Articulo añadido. <br>";
            $this->mostrarFormulario("continuar", $validador, $resultado);
            exit();

        }
        //mensaje si existe.
        $resultado = "ya existe";
        $this->mostrarFormulario("validar", $validador, $resultado);
    }


    private function validar()
    {

        $validador = new ValidadorForm();
        $reglasValidacion = $this->crearReglasDeValidacion();

        $validador->validar($_POST, $reglasValidacion);
        if ($validador->esValido()) {
            $this->registrar($validador);

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $categoria = $_POST["categoria"];
            $localizacion = $_POST["localizacion"];
            $fechaCreacion = $_POST["fechaCreacion"];
            $stockDispo = $_POST["stockDispo"];
            $codProd = $_POST["codProd"];

            $resultado = "Has añadido al inventario:  ";
            //el formulario ya se ha enviado
            //se recogen y procesan los datos
            //se llama al método para mostrar el resultado
            if (!empty($nombre = $_POST['nombre'])) {
                $nombre = $_POST['nombre'];
                $resultado .=  " el producto " . " $nombre <br />";
            }
            
            if (!empty($nombre = $_POST['descripcion'])) {
                $descripcion = $_POST['descripcion'];
                $resultado .=  "Su descripcion es:  " . " $descripcion <br />";
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
                    case "tecnologicos":
                        $resultado .= "productos tecnológicos <br />";
                        break;
                }
            }


            if (!empty($localizacion = $_POST['localizacion'])) {
                $localizacion = $_POST['localizacion'];
                $resultado .=  "La localización del producto es:  " . " $localizacion <br />";
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
            $this->mostrarFormulario("continuar", $validador, $resultado);
            exit();
        }
        $this->mostrarFormulario("validar", $validador, null);
        exit();
    }
}
