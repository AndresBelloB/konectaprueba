<?php
include('index.php');
include('includes/proceso.php');
?>

<div class="contain-table">
    <div class="container" style="max-width: 1640px;">
        <table id="tabla_inventario" class="table table-hover order-column">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre producto</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Fecha de creacion</th>
                    <th>Fecha ultima venta</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($tablainventario)) { ?>
                    <?php while ($row = $tablainventario->fetch_assoc()) : ?>
                        <div class="modal fade" id="staticBackdropEdit<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" id="form-modal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">Editar producto</h5>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-auto">
                                                    <label class="mb-2">Nombre:</label>
                                                    <input class="form-control" type="text" id="nombre<?php echo $row['id']; ?>" name="nombre<?php echo $row['id']; ?>" value="<?php echo $row['nombre']; ?>" required>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="mb-2">Referencia:</label>
                                                    <input class="form-control" type="text" id="referencia<?php echo $row['id']; ?>" name="referencia<?php echo $row['id']; ?>" value="<?php echo $row['referencia']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-auto">
                                                    <label class="mb-2">Precio</label>
                                                    <input class="form-control" type="text" id="precio<?php echo $row['id']; ?>" name="precio<?php echo $row['id']; ?>" value="<?php echo $row['precio']; ?>" required>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="mb-2">Peso:</label>
                                                    <input class="form-control" type="text" id="peso<?php echo $row['id']; ?>" name="peso<?php echo $row['id']; ?>" value="<?php echo $row['peso']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-auto">
                                                    <label class="mb-2">Categoria:</label>
                                                    <input class="form-control" type="text" id="categoria<?php echo $row['id']; ?>" name="categoria<?php echo $row['id']; ?>" value="<?php echo $row['categoria']; ?>" required>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="mb-2">Stock:</label>
                                                    <input class="form-control" type="text" id="stock<?php echo $row['id']; ?>" name="stock<?php echo $row['id']; ?>" value="<?php echo $row['stock']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-2">
                                                <div class="col-auto">
                                                    <label class="mb-2">Fecha Creacion:</label>
                                                    <input class="form-control" type="text" id="fecha_creacion<?php echo $row['id']; ?>" name="fecha_creacion<?php echo $row['id']; ?>" value="<?php echo $row['fecha_creacion']; ?>" required>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="mb-2">Fecha última vez:</label>
                                                    <input class="form-control" type="text" id="fecha_ultv<?php echo $row['id']; ?>" name="fecha_ultv<?php echo $row['id']; ?>" value="<?php echo $row['fecha_ultv']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" id="updateproduct" name="updateproduct" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade" id="staticBackdropDel<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="post" id="form-modal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">Eliminar</h5>
                                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

                                        </div>
                                        <div class="modal-body">
                                            <h5>Se borrará el siguiente producto en su totalidad:</h5>
                                            <h4 class="text-center"><?php echo $row['nombre']; ?></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="deleteproduct" name="deleteproduct" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['referencia']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                            <td><?php echo $row['peso']; ?></td>
                            <td><?php echo $row['categoria']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td><?php echo $row['fecha_creacion']; ?></td>
                            <td><?php if($row['fecha_ultv'] == "0000-00-00 00:00:00"){echo "Nunca";}else{echo  $row['fecha_ultv']; } ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $row['id'] ?>">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropDel<?php echo $row['id'] ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="js/main.js"></script>