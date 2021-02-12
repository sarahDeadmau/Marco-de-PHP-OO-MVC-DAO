<?php
include "cabecera.php";
include "helper/utilidades.php";
include "helper/input.php";

if (Input::siEnviado()) {
    $errores = $validador->getErrores();
    if (!empty($errores)) {
        echo "<div class='errores'>";
        foreach ($errores as $campo => $mensajeError) {
            echo "<p>$mensajeError</p>\n";
        }
        echo "</div>";
    }
}
?>

<form id="form" action="index.php" method="post">

    <div>
        <div class='uno'>
            <label>Nombre del producto</label>
            <input type="text" name="nombre" value="<?php echo Input::get('nombre') ?>" />
            <label>Descripción</label>
            <textarea name="descripcion" rows="5" cols="50" value="<?php echo Input::get('descripcion') ?>">Introduzca la descripción del producto: </textarea>
            <label>Categoría: </label><br />
            <input type="checkbox" name="categoria" value="cosmeticos" <?php echo Utilidades::verificarBotones(Input::get('categoria'), "cosmeticos") ?> />Cosméticos<br />
            <input type="checkbox" name="categoria" value="alimentos" <?php echo Utilidades::verificarBotones(Input::get('categoria'), "alimentos") ?> />Alimentos<br />
            <input type="checkbox" name="categoria" value="productos" <?php echo Utilidades::verificarBotones(Input::get('categoria'), "tecnologicos") ?> />Productos tecnológicos <br />


            <label>Localización</label>
            <select class="locali" name="localizacion">
                <option selected>Ubicación del producto</option>

                <?php
                $locali = array("A1", "A2", "A3", "B1", "B2", "B3", "C1", "C2", "C3");
                foreach ($locali as $l) {
                    echo "<option value= $l >";
                    echo Utilidades::verificarLista(Input::get('localizacion'), $l);
                    echo "$l</option>";
                }
                ?>
            </select><br />

            <label>Fecha Creación: </label>
            <input type="date" name="fechaCreacion" value="<?php echo Input::get('fechaCreacion') ?>" /><br />

            <label>Stock: </label>
            <input type="number" name="stockDispo" value="<?php echo Input::get('stockDispo') ?>" /><br />

            <label>Código del producto: </label>
            <input type="text" name="codProd" value="<?php echo Input::get('codProd') ?>" /><br />

            <input type="submit" name="boton" value="<?php echo $fase ?>" />
            <!--<input type="submit" name="comprobar" value="continuar">-->
            <input type="reset" name="borrar" value="borrar">

        </div>
    </div>

</form>
<?php
if (isset($resultado)) {
    echo "<div class='uno'>";
    echo $resultado;
    echo "</div>";
}
include "pie.php";
?>
