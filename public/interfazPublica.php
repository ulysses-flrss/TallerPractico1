<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-interfazPublica.css">
    <script src="https://kit.fontawesome.com/b5142e7f7e.js" crossorigin="anonymous"></script>
</head>
</span>
<body>

    <?php
        $xml = simplexml_load_file('../xml/productos.xml');
        
        if (isset($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            foreach ($xml->producto as $prod) {
                if (strpos($prod, $busqueda) !== false) {
                    echo $prod . "<br>";
                }
            }
        }else{
            echo "El producto no esta disponible";
        }
    ?>

    <form action="" method="post">
        <input type="text" placeholder="Producto a buscar..." class="search-box" name="busqueda" id="busqueda" value="">
        <button type="submit" name="buscar" id="buscar"> <i class="fa-solid fa-magnifying-glass icon"></i> </button>
    </form>

    <div id="product-container">
            <?php $productos =simplexml_load_file("../xml/productos.xml");
					foreach ($productos->producto as $prod) {					
                        ?>
        <div class="product-div">
            <h2 class="product-title"> <?= $prod->nombre ?> </h2>
            <img class="product-img" src="../img/<?=$prod->imagen?>" alt="">
            <p class="product-price"> $<?= $prod->precio ?> </p>
            <a href="#">Ver detalles</a>
        </div>
        
        <?php } ?>
    </div>
</body>
</html>