<?php
include "cabecera.php";
?>
<form id="form" action="index.php" method="post">

    <div>
        <div class='uno'>
            <label>Nombre del producto</label>
            <input type="text" name="nombre" /><br />

            <label>Descripción</label>
            <!--<input type="text" name="descripción" /></br>-->
            <textarea name="descripción" rows="5" cols="50">Introduzca la descripción del producto: </textarea>

            <label>Categoría: </label><br />
            <input type="checkbox" name="categoria" value="cosmeticos" />Productos cosméticos<br />
            <input type="checkbox" name="categoria" value="alimentos" />Alimentos<br />
            <input type="checkbox" name="categoria" value="productos" />Productos tecnológicos <br />

            <label>Localización</label>
            <select class="locali" name="localizacion">
                <option selected>Ubicación del producto</option>
                <optgroup label="Cosméticos">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                </optgroup>
                <optgroup label="Alimentos">
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="B3">B3</option>
                </optgroup>

                <optgroup label="Tecnología">
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                </optgroup>
            </select><br />

            <!--<label>Referencia</label>
            <select name="referencias">
                <?php
                /* $referencias = array("H5", "H6", "H7", "H8");
                foreach ($referencias as $r) {
                    echo "<option value='$r'>$r</option>";
                }*/
                ?> 
            </select><br />-->

            <label>Fecha Creación: </label>
            <input type="date" name="fechaCreacion" /><br />

            <label>Stock: </label>
            <input type="number" name="stockDispo" /><br />

            <label>Código del producto: </label>
            <input type="text" name="codProd" /><br />

            <input type="submit" name="guardar" value="Guardar" />
            <!--<input type="submit" name="comprobar" value="Comprobar"> -->
            <input type="reset" name="borrar" value="Borrar">

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
