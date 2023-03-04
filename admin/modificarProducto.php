<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-agregarProducto.css">
    <title>Agregar Producto</title>
</head>
<body>
    <?php 
    require_once("../class/Producto.php");
    $codigo = $_REQUEST['codigo'];
    $productos = simplexml_load_file('../xml/productos.xml');
    foreach ($productos->producto as $prod) {
        if ($prod->codigo == $codigo) {
          $editarProducto = new Producto();
          $editarProducto->setCodigo($prod->codigo);
          $editarProducto->setNombre($prod->nombre);
          $editarProducto->setDescripcion($prod->descripcion);
          $editarProducto->setImagen($prod->imagaen);
          $editarProducto->setPrecio($prod->precio);
          $editarProducto->setCategoria($prod->categoria);
          $editarProducto->setExistencias($prod->existencias);
        }
    }

    if ($_POST) {
        $errores = Producto::validar();
        if(count($errores)>0){
            echo "<div class='error'><ul>";
            foreach($errores as $error){
              echo "<li>$error</li>";
            }
            echo "</ul></div>";
        } else {
            $miProducto = new Producto();
            $miProducto->modificarProducto();
            header("location: verProductos.php");
        }
    } 
    ?>

    <div class="form-container">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" id="form" enctype="multipart/form-data">
    

            <div class="">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" id="codigo" value="<?= $editarProducto->getCodigo() ?>"  >
            </div>
        

                <div class="">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $editarProducto->getNombre()?>" >
                </div>

                <div class="">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" ><?= $editarProducto->getDescripcion()?></textarea>
                </div>  

                
                <div class="">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="">
                        <option value="<?=$editarProducto->getCategoria() ?>">Actual: <?=$editarProducto->getCategoria() ?></option>
                        <option value="Textil">Textil</option>
                        <option value="Promocional">Promocional</option>
                    </select>
                </div>

                <div class="">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" value="<?=$editarProducto->getPrecio() ?>" >
                </div>

                <div class="">
                    <label for="existencias">Existencias</label>
                    <input type="number" name="existencias" id="existencias" value="<?= $editarProducto->getExistencias()?>" >
                </div>
                
                <div class="">
                    <input type="submit" value="Agregar" name="enviar" id="registrar">
                    <a href="interfazAdministrativa.php">Cancelar</a>
                </div>
        </form>
    </div>
</body>
</html>