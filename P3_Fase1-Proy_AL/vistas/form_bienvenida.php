<?php
include "cabecera.php";
?>
<form id="form" action="index.php" method="post">

    <div>
        <div class='uno'>
            <label>Nombre del Producto</label>
            <input type="text" name="nombre" /><br />
            <label>Descripción</label>
            <input type="text" name="descripción" /></br>
            <label>Categoría: </label><br />
            <input type="checkbox" name="categoria" value="cosmeticos" />Productos Cosméticos<br />
            <input type="checkbox" name="categoria" value="alimentos" />Alimentos<br />
            <input type="checkbox" name="categoria" value="productos" />Productos Tecnológicos <br />

            <label>Localizacion</label>
            <select class="locali" aria-placeholder="Introduzca la localizacion" name="localizacion">
                <option selected>Ubicación del producto</option>
                <optgroup label="Cosméticos">
                    <option value="1">A1</option>
                    <option value="2">A2</option>
                    <option value="3">A3</option>
                </optgroup>
                <optgroup label="Alimentos">
                    <option value="4">B1</option>
                    <option value="5">B2</option>
                    <option value="6">B3</option>
                </optgroup>

                <optgroup label="Tecnología">
                    <option value="4">C1</option>
                    <option value="5">C2</option>
                    <option value="6">C3</option>
                </optgroup>
            </select><br />

            <label>Fecha Creación: </label>
            <input type="date" name="fechaCreacion" /><br />

            <label>Stock: </label>
            <input type="number" name="StocDispo" /><br />

            <label>Codigo Producto: </label>
            <input type="text" name="codProd" /><br />

            <input type="submit" name="Guardar" value="Guardar" />
            <input type="reset" name="Borrar" value="Borrar" />

        </div>


    </div>


</form>
<?php
include "pie.php";
?>