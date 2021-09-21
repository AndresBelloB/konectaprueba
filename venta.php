<?php
include('index.php');
include("includes/con_db.php");

$productos = $con->query("SELECT * FROM inventario") or die(mysqli_error($con));
$productos_lista = $productos->fetch_all();
?>

<div class="card text-center border-light mb-3">
    <div class="card-body">
        <form action="includes\proceso.php" method="POST">
            <div class="container" style="max-width: 1640px;">
                <div class="row justify-content-center mb-4" style="background: #FFFFFF;">
                    <div class="col-md-2">
                        <div>
                            <label>ID de producto a vender:</label>
                            <br>
                            <select name="productid" id="productid" class="form-select" data-live-search="true">
                                <option value="" selected disabled hidden>Seleccione</option>
                                <?php
                                foreach ($productos_lista as $nom) { ?>
                                    <?php if ($nom[1] == "") {
                                        continue;
                                    } ?>
                                    <option value="<?php if ($nom[1] != "") {
                                                        echo $nom[0];
                                                    } ?>"><?php if ($nom[1] != "") {
                                                                echo $nom[0];
                                                            } ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <button type="submit" id="venta" name="venta" class="btn btn btn-info btn-sm">Vender unidad</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>