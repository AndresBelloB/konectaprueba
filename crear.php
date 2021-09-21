<?php
include('index.php');
?>

<div class="card text-center border-light mb-3">
    <div class="card-body">
        <div class="container" style="max-width: 1640px;">
            <form action="includes/proceso.php" method="post">
                <div class="row justify-content-center mb-3">
                    <div class="form-group col-md-3">
                        <label for="inputnombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="inputreferencia">Referencia</label>
                        <input type="text" class="form-control" id="referencia" name="referencia">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputprecio">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputcategoria">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputpeso">Peso</label>
                        <input type="text" class="form-control" id="peso" name="peso">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-2">
                        <label for="inputstock">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputfechacreacion">Fecha de creación</label>
                        <input type="text" class="form-control" id="fechacreacion" name="fechacreacion">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputfechaultv">Fecha de última venta</label>
                        <input type="text" class="form-control" id="fechaultv" name="fechaultv">
                    </div>
                </div>

                <button type="submit" id="add" name="add" class="btn btn-dark">Registrar</button>
            </form>
        </div>
    </div>
</div>