<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/style-interfazPublica.css">
    <script src="https://kit.fontawesome.com/b5142e7f7e.js" crossorigin="anonymous"></script>
</head>
</span>

<body id="body">
    <h1>¡Bienvenidos a la tienda virtual de “TextilExport”!</h1><br>

    <h2>Escoge los productos que quieras:</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" placeholder="Producto a buscar..." class="search-box" name="busqueda" id="busqueda" value="">
        <button type="submit" name="buscar" id="buscar"> <i class="fa-solid fa-magnifying-glass icon"></i> </button>
    </form>
    <div id="product-container">
        <?php
        $xml = simplexml_load_file('../xml/productos.xml');

        if (isset($_POST['busqueda'])) {
            $busqueda = $_POST['busqueda'];
            foreach ($xml->producto as $prod) {
                similar_text(strtolower($prod->nombre), strtolower ($busqueda), $percent);
                if ($percent > 40) {
                    echo <<<EOD
                        <div class="product-div">
                            <h2 class="product-title">$prod->nombre </h2>
                            <img class="product-img" src="../img/$prod->imagen" alt="">
                            <p class="product-price"> $$prod->precio  </p>
                            <a href="
                        EOD;
                        $_SERVER['PHP_SELF']; echo "?codigo=$prod->codigo";
                        echo <<<EOD
                        " id="details" name="detalles">Ver detalles</a>
                        </div>
                        EOD;
                }
            }
        } 
        
        if((isset($_POST['busqueda']) && ($_POST['busqueda'] == "")) || (!isset($_POST['busqueda']))) {

            $productos = simplexml_load_file("../xml/productos.xml");
            foreach ($productos->producto as $prod) {

                echo <<<EOD
            <div class="product-div">
            <h2 class="product-title">$prod->nombre </h2>
            <img class="product-img" src="../img/$prod->imagen" alt="">
            <p class="product-price"> $$prod->precio  </p>
            <a href="
            EOD;
            $_SERVER['PHP_SELF']; echo "?codigo=$prod->codigo";
            echo <<<EOD
            " id="details" name="detalles">Ver detalles</a>
            </div> 
        EOD;
            }
        }
          
        if (isset($_REQUEST['codigo'])) {
            $codigo = $_REQUEST['codigo'];
            foreach ($xml->producto as $prod) {
                if($prod->codigo == $codigo){
                    echo <<<EOD
                    <div class="modal-container">
                <div class="modal">
                    <div>
                        <img class="modal-imagen" src="../img/$prod->imagen" alt="">
                    </div>
                    <div class="modal-info-container">
                        <h3 id="modal-codigo"><span>Codigo: </span>$prod->codigo</h3>
                        <h3 id="modal-nombre"><span>Nombre: </span>$prod->nombre</h3>
                        <h3 id="modal-precio"><span>Precio: $</span>$prod->precio c/u</h3>
                        <h3 id="modal-categoria"><span>Categoria: </span>$prod->categoria</h3>
                        <h3 id="modal-existencias"><span>Existencias: </span>$prod->existencias</h3>
                        <h3 id="modal-descripcion"><span>Descripcion:</span>$prod->descripcion</h3>
                    </div>
                    <i class="fa-solid fa-xmark" id="close"></i>    
                </div>
                EOD;
                }
            }
        }
        ?>


    
        
    </div>

    </div>

    <script src="js/modal.js"></script>
</body>

</html>