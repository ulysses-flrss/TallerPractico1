            <?php $productos = simplexml_load_file("../xml/productos.xml");
					foreach ($productos->producto as $prod) {					
                        ?>
        <div class="product-div">
            <h2 class="product-title"> <?= $prod->nombre ?> </h2>
            <img class="product-img" src="../img/<?=$prod->imagen?>" alt="">
            <p class="product-price"> $<?= $prod->precio ?> </p>
            <a href="#">Ver detalles</a>
        </div>
        <?php } ?>
