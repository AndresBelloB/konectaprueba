<?php
include("con_db.php");

$consulta = "SELECT * FROM inventario ";
$tablainventario = mysqli_query($con, $consulta);

if(isset($_POST['updateproduct'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'.$id];
    $referencia = $_POST['referencia'.$id];
    $precio = $_POST['precio'.$id];
    $peso = $_POST['peso'.$id];
    $categoria = $_POST['categoria'.$id];
    $stock = $_POST['stock'.$id];
    $fecha_creacion = $_POST['fecha_creacion'.$id];
    $fecha_ultv = $_POST['fecha_ultv'.$id];

    $con->query("UPDATE inventario SET nombre='$nombre',referencia='$referencia',precio='$precio',peso='$peso', 
        categoria='$categoria',stock='$stock',fecha_creacion='$fecha_creacion',fecha_ultv='$fecha_ultv' WHERE id=$id") or die($con->error);

    
    header("location: consultar.php");
}

if(isset($_POST['deleteproduct'])){
    $id = $_POST['id'];
    $con->query("DELETE FROM inventario WHERE id=$id ") or die or die($con->error);

    header("location: consultar.php");

}

if(isset($_POST['add'])){
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    date_default_timezone_set('America/Bogota');
    $fecha_creacion = date('Y-m-d H:i:s', time());
    $fecha_ultv = "";

    $con->query("INSERT INTO inventario(nombre,referencia,precio,peso,categoria,stock,fecha_creacion,fecha_ultv) VALUES ('$nombre','$referencia','$precio','$peso','$categoria',
        '$stock','$fecha_creacion','$fecha_ultv')") or die($con->error);

    header("location:../crear.php");

}

if(isset($_POST['venta'])){
    $id = $_POST['productid'];
    $sql = $con->query("SELECT stock FROM inventario WHERE id='$id'") or die(mysqli_error($con));
    $cantidad = $sql -> fetch_assoc();
    $stock = 0;

    if($cantidad == 0){
        echo "No se tienen productos en stock";
    }else{
        $stock = $cantidad['stock'] -1;
    }

    $con->query("UPDATE inventario SET stock='$stock' WHERE id=$id") or die($con->error);

}

?>