<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-verProductos.css">
    <title>Ver productos</title>
</head>
<body>
    <h1>Productos de “TextilExport”</h1><br>
    <a id="add" href="agregarProducto.php">Agregar Producto</a>
    
            
    <table>
        <thead>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php 
					$productos = simplexml_load_file("../xml/productos.xml");
					foreach ($productos->producto as $prod) {					
                        ?>
                    <tr>
                        <td><?=$prod->codigo?></td>
                        <td><?=$prod->nombre?></td>
                        <td><?=$prod->descripcion?></td>
                        <td> <img class="img-producto" src="../img/<?=$prod->imagen?>" alt=""> </td>
                        <td><?=$prod->categoria ?></td>
                        <td>$<?=$prod->precio ?></td>
                        <td><?=$prod->existencias ?></td>
                        <td class="botones">
                            <a href="modificarProducto.php?codigo=<?= $prod->codigo ?>">Modificar</a>
                            <a href="opcion.php?opt=eliminar&codigo=<?=$prod->codigo?>">Eliminar</a>
                        </td>
                        
                    </tr>
                    <?php }
                ?>
        </tbody>
    </table>
</body>
</html>