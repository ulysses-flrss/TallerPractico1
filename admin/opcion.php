<?php 

include_once("../class/Producto.php");
$miProducto = new Producto();

$option = isset($_REQUEST['opt'])?$_REQUEST['opt']:"";

if($option == "registrar") {
    $miProducto->registrarProducto();
} else if ($option == "ver") {
    $miProducto->verProductos();
} else if ($option == "modificar") {
    $miProducto->modificarProducto();
} else if ($option == "eliminar") {
    $miProducto->eliminarProducto();
}


?>