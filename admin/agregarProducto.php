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
    

    <h1 class="title">¡Bienvenido Empleado Administrador!</h1><br>

    <h2 class="sub-title">Llena todos los campos para ingresar un nuevo producto:</h2><br>
    
    <?php 
    require_once("../class/Producto.php");
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
            $miProducto->registrarProducto();
            header("location: verProductos.php");
        }
    } 
    ?>
    <div class="contenedor">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" id="form" enctype="multipart/form-data" class="formulario">
    

            <div class="">
                <label for="codigo" class="info">Codigo</label>
                <input type="text" name="codigo" id="codigo" value="<?= (isset($codigo))?$codigo:''?>" >
            </div>
        

                <div class="">
                    <label for="nombre" class="info">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= (isset($nombre))?$nombre:''?>" >
                </div>

                <div class="">
                    <label for="descripcion" class="info">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" value="<?= (isset($descripcion))?$descripcion:''?>" ></textarea>
                </div>

                <div class="">
                    <label for="imagen" class="info">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept=".jpg,.png,.jpeg" value="<?= (isset($imagen))?$imagen:''?>" >
                </div>
                
                <div class="">
                    <label for="categoria" class="info">Categoria</label>
                    <select name="categoria" id="">
                        <option value="Textil">Textil</option>
                        <option value="Promocional">Promocional</option>
                    </select>
                </div>

                <div class="">
                    <label for="precio" class="info">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" value="<?= (isset($precio))?$precio:''?>" >
                </div>

                <div class="">
                    <label for="existencias" class="info">Existencias</label>
                    <input type="number" name="existencias" id="existencias" value="<?= (isset($existencias))?$existencias:''?>" >
                </div>
                
                <div class="">
                    <a href="interfazAdministrativa.php" class="boton">Cancelar</a>
                    <input type="submit" value="Agregar" name="enviar" id="registrar" class="boton">
                </div>
        </form>
    </div>
</body>
</html>