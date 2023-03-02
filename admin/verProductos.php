<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-verProductos.css">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>
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
            <tr>
                <?php 
									$productos = simplexml_load_file("../xml/productos.html");
									foreach ($productos->producto as $prod) {
									
								?>
									<td><?=$prod->codigo?></td>
									<td><?=$prod->nombre?></td>
									<td><?=$prod->descripcion?></td>
									<td><?=$prod->imagen?></td>
									<td><?=$prod->categoria ?></td>
									<td><?=$prod->precio ?></td>
									<td><?=$prod->existencias ?></td>
									<td>
										<a>adsad</a>
										<a>adsad</a>
									</td>
									
							<?php } ?>
            </tr>
        </tbody>
    </table>
</body>
</html>