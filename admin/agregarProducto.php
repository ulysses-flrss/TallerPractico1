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
    <div class="form-container">
        <form action="opcion.php" method="POST" id="form">
                <div class="">
                    <label for="codigo">Codigo</label>
                    <input type="text" name="codigo" id="codigo">
                </div>

                <div class="">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>

                <div class="">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                </div>

                <div class="">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="codigo" id="codigo" accept=".jpg,.png">
                </div>
                
                <div class="">
                    <label for="categoria">Categoria</label>
                    <select name="" id="">
                        <option value="Textil">Textil</option>
                        <option value="Promocional">Promocional</option>
                    </select>
                </div>

                <div class="">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio">
                </div>

                <div class="">
                    <label for="existencias">Existencias</label>
                    <input type="number" name="existencias" id="existencias">
                </div>
                
                <div class="">
                    <input type="submit">Cancelar</input>
                    <input type="submit">Agregar</input>
                </div>
        </form>
    </div>
</body>
</html>